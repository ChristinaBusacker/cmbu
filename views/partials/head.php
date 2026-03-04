<?php
$titleSafe = htmlspecialchars(($title ?? 'Christina Busacker'), ENT_QUOTES, 'UTF-8');
$descSafe  = htmlspecialchars(($description ?? 'Tech Lead / Senior Engineer.'), ENT_QUOTES, 'UTF-8');

$canonical = $canonical ?? null;
if ($canonical !== null) {
    $canonical = htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8');
}
?>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?= $titleSafe ?></title>
<meta name="description" content="<?= $descSafe ?>" />

<?php if ($canonical): ?>
<link rel="canonical" href="<?= $canonical ?>" />
<?php endif; ?>

<link rel="stylesheet" href="/assets/app.css" />