<?php
/** @var string|null $slug */

$slug = isset($slug) ? (string)$slug : '';
$allowed = ['solarsystem', 'lmstudio-web'];

if (!in_array($slug, $allowed, true)) {
    http_response_code(404);
    $pageTitle = 'Project not found';
    $pageDescription = 'The requested project does not exist.';
    ?>
    <h1>Project not found</h1>
    <p>This project does not exist (or has been renamed).</p>
    <p><a class="button" href="/projects">Back to projects</a></p>
    <?php
    return;
}

require __DIR__ . '/' . $slug . '.php';
