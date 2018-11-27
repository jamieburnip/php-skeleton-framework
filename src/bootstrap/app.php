<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App(
    new \Slim\Container([
        'settings' => [
            'displayErrorDetails' => true,
        ],
    ])
);

/**
 * Routing
 */

require __DIR__ . '/../app/Application/Http/App/Routing/web.php';
require __DIR__ . '/../app/Application/Http/Api/v1/Routing/api.php';

return $app;
