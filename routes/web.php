<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('something', function () {
    return "hi";
})->name('something');

Route::get('/{catchall?}', function () {
    return response()->view('index');
})->where('catchall', '(.*)');

