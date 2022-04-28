<?php

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\Route;

try {
    $router = app()->make('router');
} catch (BindingResolutionException $e) {
    $router = new Route();
}

$router->namespace('Auth')->group(static function () use ($router) {
    $router->post('/login', 'LoginController')->name('login');
    $router->post('/register', 'RegisterController')->name('register');

    $router->middleware('auth:api')->group(static function () use ($router) {
        $router->get('/me', 'AuthController@me')->name('me');
    });
});

$router->middleware('auth:api')->group(static function () use ($router) {
    $router->resource('folders', 'FolderController');
});
