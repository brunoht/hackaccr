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

Route::get('/', function () {
    return redirect('/usuario');
});

// Route::get('/login-email', function () {
//     return view('login-email');
// });
Route::get('/login', function () {
    return view('login-otp');
})->name('login');

Route::get('/login/{mobile}', function ($mobile) {
    return view('login-otp-validate', compact('mobile'));
});


Route::middleware('auth:api')->get('/usuario', function () {
    return "Usuário";
});
