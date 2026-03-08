<!doctype html>
<html lang="<?= htmlspecialchars($currentLang ?? 'de', ENT_QUOTES, 'UTF-8') ?>">

<head>
  <?php require __DIR__ . '/partials/head.php'; ?>
</head>

<body>
  <?php require __DIR__ . '/' . $currentLang . '/partials/header.php'; ?>

  <main>
    <?= $content ?>
  </main>

  <?php require __DIR__ . '/' . $currentLang . '/partials/footer.php'; ?>
</body>

</html>