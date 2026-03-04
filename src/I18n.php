<?php
declare(strict_types=1);

final class I18n
{
    public const DEFAULT_LANG = 'de';
    public const SUPPORTED_LANGS = ['de', 'en'];

    public static function normalizePath(string $path): string
    {
        $path = rtrim($path, '/');
        return $path === '' ? '/' : $path;
    }

    /**
     * Returns [$lang, $routePath] where $routePath has NO language prefix.
     */
    public static function detectLangAndRoute(string $path): array
    {
        $path = self::normalizePath($path);

        $segments = explode('/', ltrim($path, '/'));
        $first = $segments[0] ?? '';

        // URL prefix wins
        if (in_array($first, self::SUPPORTED_LANGS, true)) {
            $rest = '/' . implode('/', array_slice($segments, 1));
            return [$first, self::normalizePath($rest)];
        }

        // No prefix: choose based on browser
        $browserLang = self::preferredLangFromHeader(self::SUPPORTED_LANGS, self::DEFAULT_LANG);
        return [$browserLang, $path];
    }

    public static function preferredLangFromHeader(array $supported, string $default): string
    {
        $header = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '';
        if ($header === '') return $default;

        $parts = array_map('trim', explode(',', $header));
        foreach ($parts as $part) {
            $langTag = explode(';', $part)[0] ?? '';
            $langTag = strtolower(trim($langTag));
            if ($langTag === '') continue;

            // Exact match
            if (in_array($langTag, $supported, true)) return $langTag;

            // Primary subtag match (de-DE -> de)
            $primary = explode('-', $langTag)[0] ?? '';
            if ($primary !== '' && in_array($primary, $supported, true)) return $primary;
        }

        return $default;
    }
}