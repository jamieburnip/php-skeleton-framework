<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$app->get('/', \App\Application\Http\App\Controllers\HomepageController::class)->setName('home');

$app->get('/user', function () {
    echo 'Userpage';
})->setName('user');

$app->get('/user/{id}', function (ServerRequestInterface $request, ResponseInterface $response, array $args) {
    echo 'Userpage: ' . $args['id'];
});
