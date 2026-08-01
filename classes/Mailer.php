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

        // The From: address MUST be on the domain this server actually sends mail for.
        // Using the owner's real Gmail address here (as this used to) makes every message
        // look spoofed to Gmail's own SPF/DKIM checks — MilesWeb's mail server has no
        // authorization to send as @gmail.com — and lands straight in spam. The real
        // business address goes in Reply-To instead, so replies still reach the right inbox.
        $domain = preg_replace('/^www\./', '', explode(':', $_SERVER['HTTP_HOST'] ?? 'localhost')[0]);
        $fromEmail = 'noreply@' . $domain;
        $fromName = Setting::get('business_name', 'Sivakasi Cracker');
        $replyTo = Setting::get('email');

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= 'From: ' . self::encodeHeader($fromName) . " <{$fromEmail}>\r\n";

        if ($replyTo !== '' && filter_var($replyTo, FILTER_VALIDATE_EMAIL)) {
            $headers .= "Reply-To: {$replyTo}\r\n";
        }

        if ($cc !== null && filter_var($cc, FILTER_VALIDATE_EMAIL)) {
            $headers .= "Cc: {$cc}\r\n";
        }

        // The envelope sender (-f) should match the From domain too, for the same SPF reason.
        return @mail($to, self::encodeHeader($subject), $html, $headers, '-f' . $fromEmail);
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
