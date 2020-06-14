<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

], function ($router) {

    Route::post('otp', 'AuthController@sendOTP');
    Route::post('login-otp', 'AuthController@loginWithOTP');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});


Route::middleware('auth:api')->resource('user', 'UserController')->except(['create', 'edit']);
Route::middleware('auth:api')->resource('event', 'EventController')->except(['create', 'edit']);
Route::middleware('auth:api')->resource('place', 'PlaceController')->except(['create', 'edit']);
Route::middleware('auth:api')->resource('review', 'ReviewController')->except(['create', 'edit']);
Route::middleware('auth:api')->resource('route', 'RouteController')->except(['create', 'edit']);
Route::middleware('auth:api')->resource('score', 'ScoreController')->except(['create', 'edit']);
// Route::middleware('auth:api')->resource('tip', 'TipController')->except(['create', 'edit']);
