<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'dados'], function () use($router) {
    $router->get('/', 'AllController@index');

    $router->get('/casos', 'CaseController@index');

    $router->get('/obitos', 'DeathController@index');

    $router->get('/internacoes-uti', 'HospController@index');

    $router->get('/leitos-enfermaria', 'BedController@index');

    $router->get('/vacina', 'VaccineController@index');
});

