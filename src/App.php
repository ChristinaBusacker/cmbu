<?php
declare(strict_types=1);

final class App
{
    public function __construct(
        private View $view,
        private array $routes,
        private ContactController $contact
    ) {}

    public function run(): void
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $rawPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';

        [$lang, $path] = I18n::detectLangAndRoute($rawPath);
        if (!in_array($lang, I18n::SUPPORTED_LANGS, true)) {
            $lang = I18n::DEFAULT_LANG;
        }

        // Allow POST routes (e.g., contact form). GET-only is handled by routes.

        foreach ($this->routes as $route) {
            [$m, $pattern, $viewFile] = $route;
            $paramNames = $route[3] ?? [];

            if ($m !== $method) continue;

            if (preg_match($pattern, $path, $matches) === 1) {
                array_shift($matches);

                $params = [];
                foreach ($paramNames as $i => $name) {
                    $params[$name] = $matches[$i] ?? null;
                }

                // Handler routes: use a lightweight convention ("handler:...")
                if (is_string($viewFile) && str_starts_with($viewFile, 'handler:')) {
                    $handler = substr($viewFile, strlen('handler:'));

                    if ($handler === 'contactSubmit') {
                        $this->contact->submit($lang);
                        return;
                    }

                    $this->view->notFound($lang);
                    return;
                }

                $this->view->render($lang, $viewFile, $params);
                return;
            }
        }

        $this->view->notFound($lang);
    }
}