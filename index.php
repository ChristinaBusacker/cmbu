<?php
declare(strict_types=1);

require __DIR__ . '/src/Env.php';

// Load environment config.
Env::load(__DIR__ . '/.env');

// Needed for CSRF.
if (session_status() !== PHP_SESSION_ACTIVE) {
    ini_set('session.use_strict_mode', '1');
    ini_set('session.cookie_httponly', '1');
    ini_set('session.cookie_secure', getenv('COOKIE_SECURE') ?: '0');
    session_start();
}

require __DIR__ . '/src/I18n.php';
require __DIR__ . '/src/View.php';
require __DIR__ . '/src/App.php';
require __DIR__ . '/src/SmtpMailer.php';
require __DIR__ . '/src/ContactController.php';

$routes = require __DIR__ . '/routes.php';

$view = new View(__DIR__ . '/views');
$contact = new ContactController();
$app = new App($view, $routes, $contact);
$app->run();