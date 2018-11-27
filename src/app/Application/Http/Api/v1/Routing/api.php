<?php

$app->group('/api/v1', function () {
    $this->get('/status', function () {
        echo 'ok';
    })->setName('api.v1.status');
});
