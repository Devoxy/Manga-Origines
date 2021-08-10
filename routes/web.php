<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware(['web', 'auth'])->group(function () {

    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('catalog')->group(function() {

        Route::prefix('status')->group(function() {
            Route::get('/', [App\Http\Controllers\Admin\Catalog\StatusController::class, 'index'])->name('admin.catalog.status');

            Route::post('/create', [App\Http\Controllers\Admin\Catalog\StatusController::class, 'create'])->name('admin.catalog.status.create');
            Route::get('/create', [App\Http\Controllers\Admin\Catalog\StatusController::class, 'create'])->name('admin.catalog.status.create');

            Route::post('/edit/{id}', [App\Http\Controllers\Admin\Catalog\StatusController::class, 'edit'])->name('admin.catalog.status.edit');
            Route::get('/edit/{id}', [App\Http\Controllers\Admin\Catalog\StatusController::class, 'edit'])->name('admin.catalog.status.edit');

            Route::get('/delete/{id}', [App\Http\Controllers\Admin\Catalog\StatusController::class, 'delete'])->name('admin.catalog.status.delete');
        });
    });
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

Route::prefix('catalog')->group(function() {
    Route::get('/', [App\Http\Controllers\Front\CatalogController::class, 'catalog'])->name('catalog.index');
});

Route::get('/cookie/change-mode/{mode}', [App\Http\Controllers\Front\CookieController::class, 'changeMode']);

Route::prefix('auth')->group(function() {
    Auth::routes();
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('auth.logout');
});



