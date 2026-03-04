<?php
declare(strict_types=1);

return [
    ['GET', '#^/$#', 'home.php'],

    ['GET', '#^/projects$#', 'projects/index.php'],
    ['GET', '#^/projects/([a-z0-9-]+)$#', 'projects/show.php', ['slug']],
];