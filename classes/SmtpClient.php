<?php

/**
 * Minimal SMTP client for sending mail via an authenticated relay (Brevo).
 * Deliberately dependency-free (no Composer/PHPMailer) to match this
 * project's plain-PHP, FTP-deployable approach — the whole codebase runs
 * without a build step, and this keeps it that way. Built for a well-behaved
 * standard relay (STARTTLS on 587, AUTH LOGIN), not a general-purpose client
 * for arbitrary mail servers.
 */
class SmtpClient
{
    /** @var resource|null */
    private $socket;
    private int $timeout = 15;

    public function __construct(
        private readonly string $host,
        private readonly int $port,
        private readonly string $username,
        private readonly string $password
    ) {
    }

    /**
     * @throws RuntimeException on any SMTP-level failure — callers should
     *         catch this and log/handle it, not let it bubble to the visitor.
     */
    public function send(string $fromEmail, string $to, string $rawMessage): void
    {
        try {
            $this->connect();
            $this->expect(220);

            $this->command('EHLO ' . $this->heloDomain());
            $this->expectMultiline(250);

            $this->command('STARTTLS');
            $this->expect(220);

            if (!stream_socket_enable_crypto($this->socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) {
                throw new RuntimeException('STARTTLS negotiation failed');
            }

            // Must re-EHLO after STARTTLS — the server resets its capability state.
            $this->command('EHLO ' . $this->heloDomain());
            $this->expectMultiline(250);

            $this->command('AUTH LOGIN');
            $this->expect(334);
            $this->command(base64_encode($this->username));
            $this->expect(334);
            $this->command(base64_encode($this->password));
            $this->expect(235);

            $this->command('MAIL FROM:<' . $fromEmail . '>');
            $this->expect(250);

            $this->command('RCPT TO:<' . $to . '>');
            $this->expect(250);

            $this->command('DATA');
            $this->expect(354);

            $this->command($this->dotStuff($rawMessage) . "\r\n.");
            $this->expect(250);

            $this->command('QUIT');
        } finally {
            $this->close();
        }
    }

    private function heloDomain(): string
    {
        return preg_replace('/^www\./', '', $_SERVER['HTTP_HOST'] ?? 'localhost');
    }

    private function connect(): void
    {
        $this->socket = @stream_socket_client(
            "tcp://{$this->host}:{$this->port}",
            $errno,
            $errstr,
            $this->timeout
        );
        if (!$this->socket) {
            throw new RuntimeException("Could not connect to SMTP host {$this->host}:{$this->port} — $errstr ($errno)");
        }
        stream_set_timeout($this->socket, $this->timeout);
    }

    private function command(string $cmd): void
    {
        fwrite($this->socket, $cmd . "\r\n");
    }

    private function readLine(): string
    {
        $line = fgets($this->socket, 515);
        if ($line === false) {
            throw new RuntimeException('SMTP connection closed unexpectedly');
        }
        return $line;
    }

    /** Single-line SMTP responses, e.g. "250 OK" */
    private function expect(int $code): void
    {
        $line = $this->readLine();
        if ((int) substr($line, 0, 3) !== $code) {
            throw new RuntimeException("SMTP error: expected {$code}, got: " . trim($line));
        }
    }

    /** Multi-line SMTP responses, e.g. EHLO's capability list ("250-..." then "250 ...") */
    private function expectMultiline(int $code): void
    {
        do {
            $line = $this->readLine();
            if ((int) substr($line, 0, 3) !== $code) {
                throw new RuntimeException("SMTP error: expected {$code}, got: " . trim($line));
            }
        } while (isset($line[3]) && $line[3] === '-');
    }

    /** RFC 5321 transparency: a line starting with "." must be escaped as ".." */
    private function dotStuff(string $body): string
    {
        return preg_replace('/^\./m', '..', $body);
    }

    private function close(): void
    {
        if (is_resource($this->socket)) {
            fclose($this->socket);
        }
        $this->socket = null;
    }
}
