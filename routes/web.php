<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

// 1a make router prefix
$router->group(['prefix' => 'api'], function () use ($router) {
    // 1b
    $router->get('todos', 'TodosController@index');
    $router->get('todos/{id}', 'TodosController@view');
    // post and patch need body
    $router->post('todos', 'TodosController@store'); // methode store
    // 2b add id parameter
    $router->patch('todos/{id}', 'TodosController@update');
    $router->delete('todos/{id}', 'TodosController@delete');
});

