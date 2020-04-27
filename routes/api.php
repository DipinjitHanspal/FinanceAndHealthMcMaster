<?php

use App\Http\Controllers\DashController;
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

Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('refresh', 'AuthController@refresh');
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('user', 'AuthController@user');
        Route::post('logout', 'AuthController@logout');
        // Users
        Route::get('users', 'UserController@index')->middleware('isAdmin');
        Route::get('users/{id}', 'UserController@show')->middleware('isAdminOrSelf');
    });
});

Route::middleware('auth:api')->prefix('dashboard')->group(function() {
    Route::post('set-dash', 'DashboardController@setConfig');
    Route::get('load-dash', 'DashboardController@loadConfig');
});