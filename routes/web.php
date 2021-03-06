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
$router->post('/api/v1/register', 'UserController@register');
$router->patch('/api/v1/user/{id}', 'UserController@patch');
//$router->get('/user/{id}', ['middleware' => 'auth', 'uses' =>  'UserController@get_user']);