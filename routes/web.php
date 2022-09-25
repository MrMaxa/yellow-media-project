<?php

declare(strict_types=1);

use Laravel\Lumen\Routing\Router;

/** @var $router Router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});
