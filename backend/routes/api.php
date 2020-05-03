<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(["prefix" => "api"], function () use ($router) {

    $router->group(["prefix" => "autor", "namespace" => "Autor"], function () use ($router) {
        $router->get('/', 'AutorController@index');
        $router->get('/{id}', 'AutorController@getById');
        $router->post('/register', 'AutorController@create');
        $router->put('/edit/{id}', 'AutorController@update');
        $router->delete('/remove/{id}', 'AutorController@delete');
    });

    $router->group(["prefix" => "editora", "namespace" => "Editora"], function () use ($router) {
        $router->get('/', 'EditoraController@index');
    });

    $router->group(["prefix" => "livro", "namespace" => "Livro"], function () use ($router) {
        $router->get('/', 'LivroController@index');
        $router->post('/register', 'LivroController@create');
    });
});
