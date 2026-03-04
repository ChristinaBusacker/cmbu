<?php
declare(strict_types=1);

final class View
{
    public function __construct(
        private string $viewsBasePath,
        private string $siteName = 'Christina Busacker',
        private string $defaultDescription = 'Tech Lead / Senior Engineer.'
    ) {}

    public function render(string $lang, string $view, array $data = [], int $status = 200): void
    {
        http_response_code($status);

        $layoutFile = $this->viewsBasePath . '/layout.php';
        if (!is_file($layoutFile)) {
            http_response_code(500);
            echo 'Layout not found.';
            return;
        }

        $viewFile = $this->resolveViewFile($lang, $view);
        if ($viewFile === null) {
            http_response_code(500);
            echo 'View not found.';
            return;
        }

        // Expose data variables to view + layout (same scope)
        extract($data, EXTR_SKIP);

        // Make language available everywhere (layout, partials, etc.)
        $currentLang = $lang;

        // Render view -> $content
        ob_start();
        require $viewFile;
        $content = (string) ob_get_clean();

        // Default meta (view may override via Pattern B variables)
        $title = $this->siteName;
        $description = $this->defaultDescription;
        $canonical = $this->defaultCanonical();

        if (isset($pageTitle) && is_string($pageTitle) && $pageTitle !== '') {
            $title = $pageTitle . ' | ' . $this->siteName;
        }
        if (isset($pageDescription) && is_string($pageDescription) && $pageDescription !== '') {
            $description = $pageDescription;
        }
        if (isset($pageCanonical) && is_string($pageCanonical) && $pageCanonical !== '') {
            $canonical = $pageCanonical;
        }

        require $layoutFile;
    }

    public function notFound(string $lang): void
    {
        $this->render($lang, '404.php', [], 404);
        exit;
    }

    private function resolveViewFile(string $lang, string $view): ?string
    {
        $view = ltrim($view, '/');

        $primary = $this->viewsBasePath . '/' . $lang . '/' . $view;
        if (is_file($primary)) return $primary;

        $fallback = $this->viewsBasePath . '/' . I18n::DEFAULT_LANG . '/' . $view;
        if (is_file($fallback)) return $fallback;

        return null;
    }

    private function defaultCanonical(): ?string
    {
        $host = $_SERVER['HTTP_HOST'] ?? '';
        if ($host === '') return null;

        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
        $path = I18n::normalizePath($path);

        return $scheme . '://' . $host . $path;
    }
}