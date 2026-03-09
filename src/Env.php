<?php
declare(strict_types=1);

final class Env
{
    /**
     * Loads a simple .env file (KEY=VALUE).
     * - Ignores empty lines and comments (# ...)
     * - Supports quoted values: KEY="value" / KEY='value'
     * - Populates getenv(), $_ENV and (optionally) $_SERVER
     */
    public static function load(string $path): void
    {
        if (!is_file($path) || !is_readable($path)) {
            return;
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines === false) {
            return;
        }

        foreach ($lines as $line) {
            $line = trim($line);

            // Skip comments and empty lines
            if ($line === '' || str_starts_with($line, '#')) {
                continue;
            }

            // Allow inline comments only when preceded by whitespace
            // e.g. KEY=value # comment
            if (preg_match('/\s#/', $line)) {
                $line = preg_replace('/\s#.*$/', '', $line) ?? $line;
                $line = trim($line);
            }

            // Split KEY=VALUE (first '=' only)
            $parts = explode('=', $line, 2);
            if (count($parts) !== 2) {
                continue;
            }

            $key = trim($parts[0]);
            $value = trim($parts[1]);

            if ($key === '') {
                continue;
            }

            // Strip surrounding quotes
            if (
                (str_starts_with($value, '"') && str_ends_with($value, '"')) ||
                (str_starts_with($value, "'") && str_ends_with($value, "'"))
            ) {
                $value = substr($value, 1, -1);
            }

            // Basic unescape for common sequences in double-quoted values
            $value = str_replace(['\\n', '\\r', '\\t'], ["\n", "\r", "\t"], $value);

            // Don't overwrite already-set env vars (lets hosting env win)
            if (getenv($key) !== false) {
                continue;
            }

            putenv($key . '=' . $value);
            $_ENV[$key] = $value;

            // Some libs read from $_SERVER, so this is a harmless convenience
            $_SERVER[$key] = $value;
        }
    }

    /**
     * Gets env var, with optional default.
     */
    public static function get(string $key, ?string $default = null): ?string
    {
        $v = getenv($key);
        if ($v === false) {
            return $default;
        }
        return $v;
    }

    /**
     * Returns true if env var is a truthy value (1, true, yes, on).
     */
    public static function bool(string $key, bool $default = false): bool
    {
        $v = self::get($key);
        if ($v === null)
            return $default;

        $v = strtolower(trim($v));
        return in_array($v, ['1', 'true', 'yes', 'y', 'on'], true);
    }
}