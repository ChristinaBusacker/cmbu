<?php
declare(strict_types=1);

final class App
{
    public function __construct(
        private View $view,
        private array $routes
    ) {}

    public function run(): void
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $rawPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';

        [$lang, $path] = I18n::detectLangAndRoute($rawPath);
        if (!in_array($lang, I18n::SUPPORTED_LANGS, true)) {
            $lang = I18n::DEFAULT_LANG;
        }

        if ($method !== 'GET') {
            $this->view->notFound($lang);
        }

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

                $this->view->render($lang, $viewFile, $params);
                return;
            }
        }

        $this->view->notFound($lang);
    }
}