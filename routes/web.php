<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware(['web', 'auth'])->group(function () {

    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('auth.logout');
