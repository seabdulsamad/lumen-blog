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
$router->group(['prefix' => 'api/auth'], function ($router) {
    $router->post('login', 'AuthController@login');
    $router->post('logout', 'AuthController@logout');
    $router->post('refresh', 'AuthController@refresh');
    $router->post('me', 'AuthController@me');
    $router->get('users', 'AuthController@index');
});

$router->group(['middleware' => 'jwt.auth',    'prefix' => 'api'], function ($router) {

    /**
     * Routes for resource post
     */
    $router->get('posts', 'PostsController@all');
    $router->get('posts/{id}', 'PostsController@get');
    $router->get('posts/{id}/comments', 'PostsController@comments');
    $router->post('posts', 'PostsController@add');
    $router->put('posts/{id}', 'PostsController@put');
    $router->delete('posts/{id}', 'PostsController@remove');

    /**
     * Routes for resource comment
     */
    $router->get('comments', 'CommentsController@all');
    $router->get('comments/{id}', 'CommentsController@get');
    $router->post('comments', 'CommentsController@add');
    $router->put('comments/{id}', 'CommentsController@put');
    $router->delete('comments/{id}', 'CommentsController@remove');
});

$router->get('/', function () use ($router) {
    return $router->app->version();
});
