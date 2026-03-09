<?php
declare(strict_types=1);

return [
    ['GET', '#^/$#', 'home.php'],

    ['GET', '#^/datenschutz$#', 'privacy.php'],
    ['GET', '#^/privacy$#', 'privacy.php'],

    ['GET', '#^/impressum$#', 'imprint.php'],
    ['GET', '#^/imprint$#', 'imprint.php'],

    // Contact form (POST-Redirect-GET back to /#contact)
    ['POST', '#^/contact$#', 'handler:contactSubmit'],

    ['GET', '#^/projects$#', 'projects/index.php'],
    ['GET', '#^/projects/([a-z0-9-]+)$#', 'projects/show.php', ['slug']],
];