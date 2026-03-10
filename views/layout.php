<!doctype html>
<html lang="<?= htmlspecialchars($currentLang ?? 'de', ENT_QUOTES, 'UTF-8') ?>">

<head>
  <?php require __DIR__ . '/partials/head.php'; ?>
</head>

<body class="<?= htmlspecialchars($bodyClass ?? '', ENT_QUOTES, 'UTF-8') ?>">
  <?php require __DIR__ . '/' . $currentLang . '/partials/header.php'; ?>

  <main id="main-content">
    <?= $content ?>
  </main>

  <?php require __DIR__ . '/' . $currentLang . '/partials/footer.php'; ?>
</body>

</html>