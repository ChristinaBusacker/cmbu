<?php
declare(strict_types=1);

require __DIR__ . '/src/I18n.php';
require __DIR__ . '/src/View.php';
require __DIR__ . '/src/App.php';

$routes = require __DIR__ . '/routes.php';

$view = new View(__DIR__ . '/views');
$app = new App($view, $routes);
$app->run();