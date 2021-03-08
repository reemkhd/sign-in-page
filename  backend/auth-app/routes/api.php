<?php

use Illuminate\Http\Request;

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


Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Auth\AuthController@login')->name('login');
    Route::post('register', 'Auth\AuthController@register')->name('register');
    Route::group([
      'middleware' => 'jwt.auth'
    ], function() {
        Route::get('logout', 'Auth\AuthController@logout');
        Route::get('user', 'Auth\AuthController@user');
    });
});

/*
Route::group([
    'middleware' => 'jwt.auth',
    'prefix' => 'auth'
    ], function ($router) {
    
    Route::post('login', 'Api\AuthController@login')->name('login');
    Route::get('/logout', 'Auth\LoginController@logout');
    Route::post('refresh', 'Api\AuthController@refresh')->name('refresh');
    Route::get('me', 'Api\AuthController@me')->name('me');
    });
*/