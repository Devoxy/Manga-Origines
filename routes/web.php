<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware(['web', 'auth'])->group(function () {

    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
});


Route::get('/', function () {
    return view('static.home');
})->name('home');


Route::prefix('static')->group(function() {
    Route::get('/vip', [App\Http\Controllers\Front\StaticController::class, 'vip'])->name('static.vip');
    Route::get('/contact', [App\Http\Controllers\Front\StaticController::class, 'contact'])->name('static.contact');
    Route::get('/discord', [App\Http\Controllers\Front\StaticController::class, 'discord'])->name('static.discord');

    Route::prefix('legal')->group(function() {
        Route::get('/privacy-policy', [App\Http\Controllers\Front\StaticController::class, 'privacy'])->name('static.legal.privacy');
    });
});




Auth::routes();
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('auth.logout');
