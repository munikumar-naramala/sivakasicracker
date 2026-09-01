<?php

/**
 * Sends mail via an authenticated SMTP relay (Brevo) when config/smtp.php
 * exists, falling back to PHP's built-in mail() otherwise. The switch to SMTP
 * happened because MilesWeb's outbound spam filter was intermittently
 * rejecting mail() sends outright (550 rSPAM) regardless of header/content
 * fixes — an authenticated relay with its own reputation sidesteps that.
 */
class Mailer
{
    public static function send(string $to, string $subject, string $template, array $data, ?string $cc = null): bool
    {
        if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
            error_log("Mailer: refused to send to invalid address: $to");
            return false;
        }

        $html = self::render($template, $data);
        $plainText = self::htmlToPlainText($html);

        $fromName = Setting::get('business_name', 'Sivakasi Cracker');
        $replyTo = Setting::get('email');

        $smtpConfig = self::loadSmtpConfig();
        $domain = preg_replace('/^www\./', '', explode(':', $_SERVER['HTTP_HOST'] ?? 'localhost')[0]);
        // The From: address MUST be on a domain the sending route is actually
        // authorized for. Via SMTP that's whatever config/smtp.php declares
        // (Brevo is authorized to send as it, independent of this server's
        // domain); via mail() it must be this server's own domain — using the
        // owner's real Gmail address here (as this used to) makes every message
        // look spoofed to Gmail's own SPF/DKIM checks and lands straight in spam.
        // Either way the real business address goes in Reply-To so replies land
        // in the right inbox.
        $fromEmail = $smtpConfig['from_email'] ?? ('noreply@' . $domain);

        // multipart/alternative with a real plain-text part, not HTML-only — sending
        // HTML with no plain-text fallback is itself a well-known spam-scoring signal.
        $boundary = 'b_' . bin2hex(random_bytes(16));

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: multipart/alternative; boundary=\"{$boundary}\"\r\n";
        $headers .= 'From: ' . self::encodeHeader($fromName) . " <{$fromEmail}>\r\n";

        if ($replyTo !== '' && filter_var($replyTo, FILTER_VALIDATE_EMAIL)) {
            $headers .= "Reply-To: {$replyTo}\r\n";
        }

        if ($cc !== null && filter_var($cc, FILTER_VALIDATE_EMAIL)) {
            $headers .= "Cc: {$cc}\r\n";
        }

        $body = "--{$boundary}\r\n";
        $body .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $body .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
        $body .= $plainText . "\r\n\r\n";
        $body .= "--{$boundary}\r\n";
        $body .= "Content-Type: text/html; charset=UTF-8\r\n";
        $body .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
        $body .= $html . "\r\n\r\n";
        $body .= "--{$boundary}--";

        if ($smtpConfig !== null) {
            return self::sendViaSmtp($smtpConfig, $to, $fromEmail, $fromName, $subject, $headers, $body);
        }

        return self::sendViaMail($to, $subject, $headers, $body);
    }

    private static function sendViaSmtp(array $config, string $to, string $fromEmail, string $fromName, string $subject, string $headers, string $body): bool
    {
        $messageIdDomain = substr(strrchr($fromEmail, '@'), 1) ?: 'localhost';

        $fullHeaders = 'From: ' . self::encodeHeader($fromName) . " <{$fromEmail}>\r\n"
            . 'To: ' . "<{$to}>\r\n"
            . 'Subject: ' . self::encodeHeader($subject) . "\r\n"
            . 'Date: ' . date(DATE_RFC2822) . "\r\n"
            . 'Message-ID: <' . bin2hex(random_bytes(16)) . '@' . $messageIdDomain . ">\r\n"
            // $headers already has From/Reply-To/Cc/MIME/Content-Type — strip the
            // duplicate From we just added above to avoid two From: lines.
            . preg_replace('/^From:.*\r\n/', '', $headers);

        try {
            $client = new SmtpClient($config['host'], $config['port'], $config['username'], $config['password']);
            $client->send($fromEmail, $to, $fullHeaders . "\r\n" . $body);
            return true;
        } catch (Throwable $e) {
            error_log('Mailer (SMTP): failed sending to ' . $to . ' — ' . $e->getMessage());
            return false;
        }
    }

    private static function sendViaMail(string $to, string $subject, string $headers, string $body): bool
    {
        // Deliberately NOT passing a -f envelope-sender override here: many shared hosts
        // (cPanel/Exim especially) reject or silently drop mail() calls that try to set one,
        // which can turn a spam-folder problem into total non-delivery. Let the server use
        // its own default envelope sender for the hosting account instead.
        $sent = @mail($to, self::encodeHeader($subject), $body, $headers);

        if (!$sent) {
            error_log("Mailer (mail()): returned false sending to $to, subject: $subject");
        }

        return $sent;
    }

    private static function loadSmtpConfig(): ?array
    {
        $path = BASE_PATH . '/config/smtp.php';
        if (!is_file($path)) {
            return null;
        }
        $config = require $path;
        if (empty($config['username']) || empty($config['password'])) {
            return null;
        }
        return $config;
    }

    /** Best-effort plain-text fallback derived from a rendered HTML email. */
    private static function htmlToPlainText(string $html): string
    {
        $text = preg_replace('/<br\s*\/?>/i', "\n", $html);
        $text = preg_replace('/<\/(p|tr|div|h[1-6])>/i', "\n", $text);
        $text = preg_replace('/<td[^>]*>/i', '  ', $text);
        $text = strip_tags($text);
        $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
        $text = preg_replace('/[ \t]+/', ' ', $text);
        $text = preg_replace('/\n[ \t]*\n[ \t]*\n+/', "\n\n", $text);
        return trim($text);
    }

    private static function render(string $template, array $data): string
    {
        $renderTemplate = static function (string $__template, array $__data): string {
            extract($__data, EXTR_SKIP);
            ob_start();
            include BASE_PATH . '/templates/emails/' . $__template . '.php';
            return ob_get_clean();
        };

        return $renderTemplate($template, $data);
    }

    private static function encodeHeader(string $value): string
    {
        // Strips any CR/LF a caller might pass in, and encodes non-ASCII subjects/names safely.
        $value = str_replace(["\r", "\n"], '', $value);
        return '=?UTF-8?B?' . base64_encode($value) . '?=';
    }
}
