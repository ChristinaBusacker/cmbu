<?php
declare(strict_types=1);

// Needed for CSRF + flash messages (contact form).
if (session_status() !== PHP_SESSION_ACTIVE) {
    // Reasonable defaults; feel free to tune.
    ini_set('session.use_strict_mode', '1');
    ini_set('session.cookie_httponly', '1');
    // If your site is HTTPS (it should be), enable this on the server.
    // ini_set('session.cookie_secure', '1');
    session_start();
}

require __DIR__ . '/src/I18n.php';
require __DIR__ . '/src/View.php';
require __DIR__ . '/src/App.php';
require __DIR__ . '/src/ContactController.php';

$routes = require __DIR__ . '/routes.php';

$view = new View(__DIR__ . '/views');
$contact = new ContactController();
$app = new App($view, $routes, $contact);
$app->run();