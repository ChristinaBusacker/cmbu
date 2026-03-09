<?php
declare(strict_types=1);

/**
 * Minimal SMTP mailer (no external libraries).
 *
 * Supports:
 * - AUTH LOGIN
 * - STARTTLS (tls)
 * - SSL (ssl)
 */
final class SmtpMailer
{
    public function __construct(
        private string $host,
        private int $port,
        private string $user,
        private string $pass,
        private string $secure,
        private int $timeoutSeconds = 10,
    ) {
    }

    public function send(
        string $to,
        string $subject,
        string $body,
        string $fromEmail,
        string $fromName,
        ?string $replyTo = null,
    ): bool {
        $fromName = $this->sanitizeHeader($fromName);
        $fromEmail = $this->sanitizeEmail($fromEmail);
        $to = $this->sanitizeEmail($to);
        $replyTo = $replyTo !== null ? $this->sanitizeEmail($replyTo) : null;

        $socket = $this->connect();
        if ($socket === null) {
            return false;
        }

        try {
            $this->expect($socket, [220]);

            $this->command($socket, 'EHLO ' . $this->clientName());
            $this->expect($socket, [250]);

            if ($this->secure === 'tls') {
                $this->command($socket, 'STARTTLS');
                $this->expect($socket, [220]);
                if (!stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) {
                    return false;
                }
                $this->command($socket, 'EHLO ' . $this->clientName());
                $this->expect($socket, [250]);
            }

            if ($this->user !== '') {
                $this->command($socket, 'AUTH LOGIN');
                $this->expect($socket, [334]);
                $this->command($socket, base64_encode($this->user));
                $this->expect($socket, [334]);
                $this->command($socket, base64_encode($this->pass));
                $this->expect($socket, [235]);
            }

            $this->command($socket, 'MAIL FROM:<' . $fromEmail . '>');
            $this->expect($socket, [250]);

            $this->command($socket, 'RCPT TO:<' . $to . '>');
            $this->expect($socket, [250, 251]);

            $this->command($socket, 'DATA');
            $this->expect($socket, [354]);

            $headers = [];
            $headers[] = 'From: ' . $this->encodeHeader($fromName) . ' <' . $fromEmail . '>';
            $headers[] = 'To: <' . $to . '>';
            $headers[] = 'Subject: ' . $this->encodeHeader($subject);
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-Type: text/plain; charset=UTF-8';
            $headers[] = 'Content-Transfer-Encoding: 8bit';
            if ($replyTo) {
                $headers[] = 'Reply-To: ' . $replyTo;
            }

            // RFC 5321: lines must not exceed 1000 chars incl. CRLF.
            $data = implode("\r\n", $headers) . "\r\n\r\n" . $this->normalizeBody($body);
            $data = $this->dotStuff($data);

            fwrite($socket, $data . "\r\n.\r\n");
            $this->expect($socket, [250]);

            $this->command($socket, 'QUIT');
            fclose($socket);
            return true;
        } catch (\Throwable $e) {
            try {
                $this->command($socket, 'QUIT');
            } catch (\Throwable $ignore) {
            }
            fclose($socket);
            return false;
        }
    }

    private function connect(): mixed
    {
        $transport = ($this->secure === 'ssl') ? 'ssl://' : '';
        $errno = 0;
        $errstr = '';
        $socket = @fsockopen($transport . $this->host, $this->port, $errno, $errstr, $this->timeoutSeconds);
        if (!$socket) {
            return null;
        }
        stream_set_timeout($socket, $this->timeoutSeconds);
        return $socket;
    }

    private function command($socket, string $command): void
    {
        fwrite($socket, $command . "\r\n");
    }

    private function expect($socket, array $codes): void
    {
        $line = '';
        $code = 0;

        while (($l = fgets($socket, 515)) !== false) {
            $line .= $l;
            if (preg_match('/^(\d{3})([\s-])/', $l, $m)) {
                $code = (int) $m[1];
                if ($m[2] === ' ') {
                    break;
                }
            }
        }

        if (!in_array($code, $codes, true)) {
            throw new \RuntimeException('SMTP unexpected response: ' . trim($line));
        }
    }

    private function clientName(): string
    {
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        $host = preg_replace('/[^a-zA-Z0-9.-]/', '', $host);
        return $host !== '' ? $host : 'localhost';
    }

    private function sanitizeHeader(string $v): string
    {
        return trim(str_replace(["\r", "\n"], '', $v));
    }

    private function sanitizeEmail(string $v): string
    {
        $v = $this->sanitizeHeader($v);
        return $v;
    }

    private function encodeHeader(string $value): string
    {
        $value = $this->sanitizeHeader($value);
        // Use RFC 2047 encoding for UTF-8
        if (preg_match('/[^\x20-\x7E]/', $value)) {
            return '=?UTF-8?B?' . base64_encode($value) . '?=';
        }
        return $value;
    }

    private function normalizeBody(string $body): string
    {
        $body = str_replace(["\r\n", "\r"], "\n", $body);
        return str_replace("\n", "\r\n", $body);
    }

    private function dotStuff(string $data): string
    {
        return preg_replace('/\r\n\./', "\r\n..", $data);
    }
}
