<?php

/**
 * Thin wrapper around PHP's mail(). Renders a PHP template (which must escape
 * every interpolated value itself, e.g. via e()/nl()) into an HTML string.
 * If mail() proves unreliable on the MilesWeb shared IP, swap the internals
 * of send() for an SMTP call — callers don't need to change.
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

        // The From: address MUST be on the domain this server actually sends mail for.
        // Using the owner's real Gmail address here (as this used to) makes every message
        // look spoofed to Gmail's own SPF/DKIM checks — MilesWeb's mail server has no
        // authorization to send as @gmail.com — and lands straight in spam. The real
        // business address goes in Reply-To instead, so replies still reach the right inbox.
        $domain = preg_replace('/^www\./', '', explode(':', $_SERVER['HTTP_HOST'] ?? 'localhost')[0]);
        $fromEmail = 'noreply@' . $domain;
        $fromName = Setting::get('business_name', 'Sivakasi Cracker');
        $replyTo = Setting::get('email');

        // multipart/alternative with a real plain-text part, not HTML-only — sending
        // HTML with no plain-text fallback is itself a well-known spam-scoring signal,
        // separate from the sender-authentication issues already fixed above.
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

        // Deliberately NOT passing a -f envelope-sender override here: many shared hosts
        // (cPanel/Exim especially) reject or silently drop mail() calls that try to set one,
        // which can turn a spam-folder problem into total non-delivery. Let the server use
        // its own default envelope sender for the hosting account instead.
        $sent = @mail($to, self::encodeHeader($subject), $body, $headers);

        if (!$sent) {
            error_log("Mailer: mail() returned false sending to $to, subject: $subject");
        }

        return $sent;
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
