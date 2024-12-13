<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\User\HomeController::class, 'index'])->name('home');

Route::get('/login', [App\Http\Controllers\User\LoginController::class, 'index'])->name('login');
Route::post('/login/process', [App\Http\Controllers\User\LoginController::class, 'login'])->name('post.login');
Route::get('/otp', [App\Http\Controllers\User\LoginController::class, 'otpView'])->name('otp');
Route::post('/otp/process', [App\Http\Controllers\User\LoginController::class, 'otp'])->name('post.otp');
Route::get('/logout', [App\Http\Controllers\User\LoginController::class, 'logout'])->name('logout');

Route::get('/indekos/{id}', [App\Http\Controllers\User\IndekosController::class, 'index'])->name('indexkos.detail');

Route::get('/profile', [App\Http\Controllers\User\ProfileController::class, 'index'])->name('profile')->middleware('auth:web');
Route::post('/profile/update', [App\Http\Controllers\User\ProfileController::class, 'update'])->name('profile.update')->middleware('auth:web');

Route::get('/pengaturan', [App\Http\Controllers\User\PengaturanController::class, 'index'])->name('pengaturan');

Auth::routes();
Route::get('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'index'])->name('admin.login')->middleware('guest:admin');
Route::post('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'login']);


Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/admin/indekos', App\Http\Controllers\Admin\IndekosController::class);
    Route::resource('/admin/booking', App\Http\Controllers\Admin\BookingController::class);
    Route::resource('/admin/account', App\Http\Controllers\Admin\AdminController::class);
    Route::get('/admin/account/{id}/edit-password', [App\Http\Controllers\Admin\AdminController::class, 'editPassword'])->name('account.edit-password');
    Route::put('/admin/account/{id}/update-password', [App\Http\Controllers\Admin\AdminController::class, 'updatePassword'])->name('account.update-password');
    Route::resource('/admin/customers', App\Http\Controllers\Admin\CustomerController::class);
});
