<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BookingController;
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





