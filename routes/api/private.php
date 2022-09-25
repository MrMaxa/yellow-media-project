<?php

declare(strict_types=1);

/** @var \Laravel\Lumen\Routing\Router $router */

use Laravel\Lumen\Routing\Router;

$router->group([
    'prefix' => 'user',
    'as' => 'user',
], function (Router $router) {
    $router->get('companies', [
        'uses' => 'Company\CompanyController@index',
        'as' => 'index',
    ]);

    $router->post('companies', [
        'uses' => 'Company\CompanyController@store',
        'as' => 'store',
    ]);
});
