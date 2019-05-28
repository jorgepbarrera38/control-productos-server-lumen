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

$router->group(['prefix' => 'products'], function () use ($router) {
    $router->get('/', 'ProductController@index');
    $router->get('/{product}', 'ProductController@show');
    $router->post('/', 'ProductController@store');
    $router->put('/{product}', 'ProductController@update');
    $router->delete('/{product}', 'ProductController@destroy');
});