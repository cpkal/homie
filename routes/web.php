<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\User\HomeController::class, 'index'])->name('home');

Route::get('/login', [App\Http\Controllers\User\LoginController::class, 'index'])->name('login');

Route::get('/indekos/{slug}', [App\Http\Controllers\User\IndekosController::class, 'index'])->name('indexkos.detail');

Route::get('/profile', [App\Http\Controllers\User\ProfileController::class, 'index'])->name('profile');

Route::get('/pengaturan', [App\Http\Controllers\User\PengaturanController::class, 'index'])->name('pengaturan');

Auth::routes();

// route group dashboard
Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('indekos', App\Http\Controllers\Admin\IndekosController::class);
    Route::resource('booking', App\Http\Controllers\Admin\BookingController::class);
    Route::resource('account', App\Http\Controllers\Admin\AdminController::class);
});
