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

// الحجوزات - لوحة التحكم
// Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/bookings', [BookingController::class, 'index'])->name('admin.bookings.index');
    Route::patch('/bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('admin.bookings.updateStatus');
    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('admin.bookings.destroy');
    Route::get('/admin/admindashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');
Route::get('/admin/users/{user}', [AdminUserController::class, 'show'])->name('admin.users.show');
Route::get('/admin/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
// });





