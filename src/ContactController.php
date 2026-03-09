<?php
declare(strict_types=1);

final class ContactController
{
    /**
     * Where contact emails should be delivered.
     * You can override via environment variable CONTACT_TO.
     */
    private string $to;

    private ?SmtpMailer $smtp = null;

    private string $fromEmail;

    private string $fromName;

    public function __construct()
    {
        $this->to = getenv('CONTACT_TO') ?: 'email@christina-busacker.de';

        $this->fromEmail = getenv('MAIL_FROM_EMAIL') ?: ('no-reply@' . ($_SERVER['HTTP_HOST'] ?? 'localhost'));
        $this->fromName = getenv('MAIL_FROM_NAME') ?: 'christina-busacker.de';

        $smtpHost = getenv('SMTP_HOST') ?: '';
        $smtpUser = getenv('SMTP_USER') ?: '';
        $smtpPass = getenv('SMTP_PASS') ?: '';
        $smtpPort = (int)(getenv('SMTP_PORT') ?: 587);
        $smtpSecure = strtolower((string)(getenv('SMTP_SECURE') ?: 'tls'));
        if (!in_array($smtpSecure, ['tls', 'ssl', 'none'], true)) {
            $smtpSecure = 'tls';
        }

        // Enable SMTP only if host is configured.
        if ($smtpHost !== '') {
            $this->smtp = new SmtpMailer($smtpHost, $smtpPort, $smtpUser, $smtpPass, $smtpSecure);
        }
    }

    public function submit(string $lang): void
    {
        $wantsJson = $this->wantsJson();

        // Basic anti-spam: POST only
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            if ($wantsJson) {
                $this->json(false, $lang === 'en' ? 'Method not allowed.' : 'Methode nicht erlaubt.', [], 405);
            }
            $this->redirect($lang, '/#contact');
        }

        // CSRF
        $token = (string)($_POST['_csrf'] ?? '');
        $sessionToken = (string)($_SESSION['csrf_token'] ?? '');
        if ($token === '' || $sessionToken === '' || !hash_equals($sessionToken, $token)) {
            $msg = $lang === 'en'
                ? 'Your session has expired. Please try again.'
                : 'Deine Sitzung ist abgelaufen. Bitte versuche es erneut.';

            if ($wantsJson) {
                $this->json(false, $msg, ['_csrf' => $msg], 419);
            }

            $this->flashError($lang, $msg, [], $this->oldInput());
            $this->redirect($lang, '/#contact', 303);
        }

        // Honeypot (should remain empty)
        $honeypot = trim((string)($_POST['website'] ?? ''));
        if ($honeypot !== '') {
            // Pretend success.
            $msg = $lang === 'en'
                ? 'Thanks! Your message has been sent.'
                : 'Danke! Deine Nachricht wurde gesendet.';

            if ($wantsJson) {
                $this->json(true, $msg, [], 200);
            }

            $this->flashSuccess($lang, $msg);
            $this->redirect($lang, '/#contact', 303);
        }

        // Rate limiting (very simple)
        $now = time();
        $last = (int)($_SESSION['contact_last_submit'] ?? 0);
        if ($last > 0 && ($now - $last) < 20) {
            $msg = $lang === 'en'
                ? 'Please wait a moment before sending another message.'
                : 'Bitte warte kurz, bevor du eine weitere Nachricht sendest.';

            if ($wantsJson) {
                $this->json(false, $msg, [], 429);
            }

            $this->flashError($lang, $msg, [], $this->oldInput());
            $this->redirect($lang, '/#contact', 303);
        }

        $name = trim((string)($_POST['name'] ?? ''));
        $company = trim((string)($_POST['company'] ?? ''));
        $email = trim((string)($_POST['email'] ?? ''));
        $message = trim((string)($_POST['message'] ?? ''));
        $consent = (string)($_POST['consent'] ?? '');

        $errors = [];
        if ($name === '' || mb_strlen($name) < 2) {
            $errors['name'] = $lang === 'en' ? 'Please enter your name.' : 'Bitte gib deinen Namen an.';
        }

        if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = $lang === 'en' ? 'Please enter a valid email address.' : 'Bitte gib eine gültige E-Mail-Adresse an.';
        }

        if ($message === '' || mb_strlen($message) < 10) {
            $errors['message'] = $lang === 'en'
                ? 'Please enter a message (at least 10 characters).'
                : 'Bitte gib eine Nachricht ein (mindestens 10 Zeichen).';
        }

        if ($consent !== '1') {
            $errors['consent'] = $lang === 'en'
                ? 'Please confirm the privacy notice.'
                : 'Bitte bestätige den Datenschutzhinweis.';
        }

        if (!empty($errors)) {
            $msg = $lang === 'en'
                ? 'Please check the form and correct the highlighted fields.'
                : 'Bitte prüfe das Formular und korrigiere die markierten Felder.';

            if ($wantsJson) {
                $this->json(false, $msg, $errors, 422);
            }

            $this->flashError($lang, $msg, $errors, $this->oldInput());
            $this->redirect($lang, '/#contact', 303);
        }

        $subject = $lang === 'en'
            ? 'New message via christina-busacker.de'
            : 'Neue Nachricht über christina-busacker.de';

        $lines = [];
        $lines[] = 'Name: ' . $name;
        if ($company !== '') $lines[] = 'Unternehmen: ' . $company;
        $lines[] = 'E-Mail: ' . $email;
        $lines[] = '';
        $lines[] = $message;
        $body = implode("\n", $lines);

        // Defensive: prevent header injection
        $safeEmail = str_replace(["\r", "\n"], '', $email);

        $ok = false;
        if ($this->smtp !== null) {
            $ok = $this->smtp->send(
                $this->to,
                $subject,
                $body,
                $this->fromEmail,
                $this->fromName,
                $safeEmail
            );
        } else {
            $headers = [];
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-Type: text/plain; charset=UTF-8';
            $headers[] = 'From: ' . $this->fromName . ' <' . $this->fromEmail . '>';
            $headers[] = 'Reply-To: ' . $safeEmail;

            $ok = @mail(
                $this->to,
                $subject,
                $body,
                implode("\r\n", $headers)
            );
        }

        if ($ok) {
            $_SESSION['contact_last_submit'] = $now;
            $msg = $lang === 'en'
                ? 'Thanks! Your message has been sent.'
                : 'Danke! Deine Nachricht wurde gesendet.';

            if ($wantsJson) {
                $this->json(true, $msg, [], 200);
            }

            $this->flashSuccess($lang, $msg);
        } else {
            // If mail() is not configured on the host, fail gracefully.
            $msg = $lang === 'en'
                ? 'Sorry, sending failed. Please email me directly.'
                : 'Leider hat das Senden nicht funktioniert. Bitte schreibe mir direkt per E-Mail.';

            if ($wantsJson) {
                $this->json(false, $msg, [], 500);
            }

            $this->flashError($lang, $msg, [], $this->oldInput());
        }

        $this->redirect($lang, '/#contact', 303);
    }

    private function wantsJson(): bool
    {
        $accept = (string)($_SERVER['HTTP_ACCEPT'] ?? '');
        if (stripos($accept, 'application/json') !== false) {
            return true;
        }
        $xhr = (string)($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '');
        return strtolower($xhr) === 'xmlhttprequest';
    }

    private function json(bool $ok, string $message, array $errors, int $status): void
    {
        http_response_code($status);
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode([
            'ok' => $ok,
            'message' => $message,
            'errors' => (object)$errors,
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        exit;
    }

    private function oldInput(): array
    {
        return [
            'name' => (string)($_POST['name'] ?? ''),
            'company' => (string)($_POST['company'] ?? ''),
            'email' => (string)($_POST['email'] ?? ''),
            'message' => (string)($_POST['message'] ?? ''),
            'consent' => (string)($_POST['consent'] ?? ''),
        ];
    }

    private function flashSuccess(string $lang, string $message): void
    {
        $_SESSION['flash'] = [
            'type' => 'success',
            'message' => $message,
            'lang' => $lang,
        ];
    }

    private function flashError(string $lang, string $message, array $errors = [], array $old = []): void
    {
        $_SESSION['flash'] = [
            'type' => 'error',
            'message' => $message,
            'errors' => $errors,
            'old' => $old,
            'lang' => $lang,
        ];
    }

    private function redirect(string $lang, string $path, int $status = 302): void
    {
        $prefix = ($lang === 'en') ? '/en' : '';
        header('Location: ' . $prefix . $path, true, $status);
        exit;
    }
}
