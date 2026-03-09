<?php
/** @var string|null $slug */

$slug = isset($slug) ? (string)$slug : '';
$allowed = ['solarsystem', 'lmstudio-web'];

if (!in_array($slug, $allowed, true)) {
    http_response_code(404);
    $pageTitle = 'Projekt nicht gefunden';
    $pageDescription = 'Das angeforderte Projekt existiert nicht.';
    ?>
    <h1>Projekt nicht gefunden</h1>
    <p>Dieses Projekt existiert nicht (oder wurde umbenannt).</p>
    <p><a class="button" href="/projects">Zur Projektübersicht</a></p>
    <?php
    return;
}

require __DIR__ . '/' . $slug . '.php';
