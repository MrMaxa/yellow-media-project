<?php

declare(strict_types=1);

use Laravel\Lumen\Routing\Router;

/** @var $router Router */

$router->group([
    'prefix' => 'user',
    'as' => 'user',
], function (Router $router) {
    $router->post('register', [
        'uses' => 'User\AuthController@register',
        'as' => 'register',
    ]);

    $router->post('sign-in', [
        'uses' => 'User\AuthController@signIn',
        'as' => 'sign-in',
    ]);

    $router->post('recover-password', [
        'uses' => 'User\AuthController@recoverPassword',
        'as' => 'recover-password',
    ]);

    $router->patch('recover-password/{token}', [
        'uses' => 'User\AuthController@confirmRecoverPassword',
        'as' => 'confirm-recover-password',
    ]);
});

$router->get('/', function () use ($router) {
    return $router->app->version();
});
