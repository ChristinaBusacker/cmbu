<?php
$titleSafe = htmlspecialchars(($title ?? 'Christina Busacker'), ENT_QUOTES, 'UTF-8');
$descSafe = htmlspecialchars(($description ?? 'Tech Lead / Senior Engineer.'), ENT_QUOTES, 'UTF-8');

$canonicalUrl = $canonical ?? null;
if ($canonicalUrl !== null) {
    $canonicalUrl = htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8');
}

function vite_tags(string $entry): string
{
    $isDev = ($_ENV['VITE_DEV'] ?? getenv('VITE_DEV') ?? '') === '1';

    if ($isDev) {
        $devServer = 'http://localhost:5173';
        return
            '<script type="module" src="' . $devServer . '/@vite/client"></script>' . "\n" .
            '<script type="module" src="' . $devServer . '/' . ltrim($entry, '/') . '"></script>';
    }

    $manifestPath = __DIR__ . '/../../assets/build/manifest.json';
    if (!is_file($manifestPath)) {
        return '';
    }

    static $manifest = null;
    if ($manifest === null) {
        $json = file_get_contents($manifestPath);
        $manifest = $json ? json_decode($json, true) : [];
    }

    if (!isset($manifest[$entry]))
        return '';

    $tags = '';

    foreach (($manifest[$entry]['css'] ?? []) as $cssFile) {
        $tags .= '<link rel="stylesheet" href="/assets/build/' . $cssFile . '">' . "\n";
    }

    $jsFile = $manifest[$entry]['file'] ?? null;
    if ($jsFile) {
        $tags .= '<script type="module" src="/assets/build/' . $jsFile . '"></script>' . "\n";
    }

    return trim($tags);
}
?>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?= $titleSafe ?></title>
<meta name="description" content="<?= $descSafe ?>" />

<?php if ($canonicalUrl): ?>
    <link rel="canonical" href="<?= $canonicalUrl ?>" />
<?php endif; ?>

<?= vite_tags('src/main.ts') ?>