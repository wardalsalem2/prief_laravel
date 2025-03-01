<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\AdminOwnerController;
use App\Http\Controllers\OwnerProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoreController;

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

// صفحة الـ login
Route::get('/', function () {
    return view('auth.login_reg'); 
})->name('login');

// صفحة التسجيل
Route::get('/register', function () {
    return view('auth.login_reg');
})->name('register');  

// الـ POST الخاص بتسجيل الدخول
Route::post('/login', [CustomAuthController::class, 'login']);

// الـ POST الخاص بالتسجيل
Route::post('/register', [CustomAuthController::class, 'register']);

// الـ GET الخاص بالـ logout
Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');

// صفحة الـ contact
Route::get('/contact', function () {
    return view('component.contact');
})->name('contact');

// صفحات الـ Admin
Route::get('/admin/dashbord', [AdminOwnerController::class, 'index'])
    ->middleware('role:admin')
    ->name('admin.dashbord');

// صفحات الـ Owner
Route::get('/owner/dashbord', [OwnerProfileController::class, 'index'])
    ->middleware('role:owner')
    ->name('owner.dashbord');

// صفحات الـ User
Route::get('/user/index', [UserController::class, 'index'])
    ->middleware('role:user')
    ->name('user.index');


Route::get('/index', function () {
    return view('user.index');
});
Route::get('/detailse', function () {
    return view('user.details');
});
Route::get('/profaile', function () {
    return view('user.profaile');
});
Route::get('/chalets', function () {
    return view('user.chalets');
});
