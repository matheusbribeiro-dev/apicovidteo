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

$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use($router) {
    $router->post('/create-case', 'Admin\\CaseController@index');
    $router->post('/create-death', 'Admin\\DeathController@index');
    $router->post('/create-hospitalizations', 'Admin\\HospController@index');
    $router->post('/create-beds', 'Admin\\BedsController@index');
    $router->post('/create-vaccine', 'Admin\\VaccineController@index');
});

$router->group(['prefix' => 'api'], function () use($router) {
    $router->post('/login', 'Admin\\AuthController@login');
    $router->post('/register', 'Admin\\AuthController@register');
});

