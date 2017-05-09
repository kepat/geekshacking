<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Grouping of External API
Route::group(['namespace' => 'Api', 'prefix' => 'external'], function () {

    // Posts API
    Route::resource('posts', 'PostsController', ['only' => ['index', 'store']]);

});