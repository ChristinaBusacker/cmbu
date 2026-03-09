<?php
declare(strict_types=1);

final class ContactController
{
    /**
     * Where contact emails should be delivered.
     * You can override via environment variable CONTACT_TO.
     */
    private string $to;

    public function __construct()
    {
        $this->to = getenv('CONTACT_TO') ?: 'email@christina-busacker.de';
    }

    public function submit(string $lang): void
    {
        // Basic anti-spam: POST only
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            $this->redirect($lang, '/#contact');
        }

        // CSRF
        $token = (string)($_POST['_csrf'] ?? '');
        $sessionToken = (string)($_SESSION['csrf_token'] ?? '');
        if ($token === '' || $sessionToken === '' || !hash_equals($sessionToken, $token)) {
            $this->flashError(
                $lang,
                $lang === 'en'
                    ? 'Your session has expired. Please try again.'
                    : 'Deine Sitzung ist abgelaufen. Bitte versuche es erneut.',
                [],
                $this->oldInput()
            );
            $this->redirect($lang, '/#contact', 303);
        }

        // Honeypot (should remain empty)
        $honeypot = trim((string)($_POST['website'] ?? ''));
        if ($honeypot !== '') {
            // Pretend success.
            $this->flashSuccess(
                $lang,
                $lang === 'en'
                    ? 'Thanks! Your message has been sent.'
                    : 'Danke! Deine Nachricht wurde gesendet.'
            );
            $this->redirect($lang, '/#contact', 303);
        }

        // Rate limiting (very simple)
        $now = time();
        $last = (int)($_SESSION['contact_last_submit'] ?? 0);
        if ($last > 0 && ($now - $last) < 20) {
            $this->flashError(
                $lang,
                $lang === 'en'
                    ? 'Please wait a moment before sending another message.'
                    : 'Bitte warte kurz, bevor du eine weitere Nachricht sendest.',
                [],
                $this->oldInput()
            );
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
            $this->flashError(
                $lang,
                $lang === 'en'
                    ? 'Please check the form and correct the highlighted fields.'
                    : 'Bitte prüfe das Formular und korrigiere die markierten Felder.',
                $errors,
                $this->oldInput()
            );
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
        $headers = [];
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-Type: text/plain; charset=UTF-8';
        $headers[] = 'From: christina-busacker.de <no-reply@' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . '>';
        $headers[] = 'Reply-To: ' . $safeEmail;

        $ok = @mail(
            $this->to,
            $subject,
            $body,
            implode("\r\n", $headers)
        );

        if ($ok) {
            $_SESSION['contact_last_submit'] = $now;
            $this->flashSuccess(
                $lang,
                $lang === 'en'
                    ? 'Thanks! Your message has been sent.'
                    : 'Danke! Deine Nachricht wurde gesendet.'
            );
        } else {
            // If mail() is not configured on the host, fail gracefully.
            $this->flashError(
                $lang,
                $lang === 'en'
                    ? 'Sorry, sending failed. Please email me directly.'
                    : 'Leider hat das Senden nicht funktioniert. Bitte schreibe mir direkt per E-Mail.',
                [],
                $this->oldInput()
            );
        }

        $this->redirect($lang, '/#contact', 303);
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
