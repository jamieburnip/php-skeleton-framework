<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App(
    new \Slim\Container
);

$app->get('/', function() {
    echo 'Home';
});

return $app;
