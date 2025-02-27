<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login&reg');
});
Route::get('/index', function () {
    return view('user.index');
});
Route::get('/detailse', function () {
    return view('user.details');
});
Route::get('/profaile', function () {
    return view('user.profaile');
});
