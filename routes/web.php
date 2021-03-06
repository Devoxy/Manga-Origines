<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware(['web', 'auth'])->group(function () {

    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/cloud', [App\Http\Controllers\Admin\DashboardController::class, 'cloud'])->name('admin.cloud');

    Route::prefix('catalog')->group(function() {

        Route::prefix('mangas')->group(function() {
            Route::get('/', [App\Http\Controllers\Admin\Catalog\CatalogController::class, 'index'])->name('admin.catalog.mangas');

            Route::post('/create', [App\Http\Controllers\Admin\Catalog\CatalogController::class, 'create'])->name('admin.catalog.mangas.create');
            Route::get('/create', [App\Http\Controllers\Admin\Catalog\CatalogController::class, 'create'])->name('admin.catalog.mangas.create');

            Route::post('/edit/{id}', [App\Http\Controllers\Admin\Catalog\CatalogController::class, 'edit'])->name('admin.catalog.mangas.edit');
            Route::get('/edit/{id}', [App\Http\Controllers\Admin\Catalog\CatalogController::class, 'edit'])->name('admin.catalog.mangas.edit');

            Route::get('/delete/{id}', [App\Http\Controllers\Admin\Catalog\CatalogController::class, 'delete'])->name('admin.catalog.mangas.delete');

            Route::post('/upload/{id}', [App\Http\Controllers\Admin\Catalog\CatalogController::class, 'upload'])->name('admin.catalog.mangas.upload');

            Route::get('/uploadProcess/{manga}/{zipFileName}', [App\Http\Controllers\Admin\Catalog\CatalogController::class, 'uploadProcess'])->name('admin.catalog.mangas.uploadProcess');

            Route::get('/chapter/edit/{id}', [App\Http\Controllers\Admin\Catalog\CatalogController::class, 'editChapter'])->name('admin.catalog.mangas.chapter.edit');
            Route::get('/chapter/delete/{id}', [App\Http\Controllers\Admin\Catalog\CatalogController::class, 'deleteChapter'])->name('admin.catalog.mangas.chapter.delete');

            Route::get('/chapter/image/delete/{id}', [App\Http\Controllers\Admin\Catalog\CatalogController::class, 'deleteImageChapter'])->name('admin.catalog.mangas.chapter.image.delete');

        });

        Route::prefix('tags')->group(function() {
            Route::get('/', [App\Http\Controllers\Admin\Catalog\TagController::class, 'index'])->name('admin.catalog.tags');

            Route::post('/create', [App\Http\Controllers\Admin\Catalog\TagController::class, 'create'])->name('admin.catalog.tags.create');
            Route::get('/create', [App\Http\Controllers\Admin\Catalog\TagController::class, 'create'])->name('admin.catalog.tags.create');

            Route::post('/edit/{id}', [App\Http\Controllers\Admin\Catalog\TagController::class, 'edit'])->name('admin.catalog.tags.edit');
            Route::get('/edit/{id}', [App\Http\Controllers\Admin\Catalog\TagController::class, 'edit'])->name('admin.catalog.tags.edit');

            Route::get('/delete/{id}', [App\Http\Controllers\Admin\Catalog\TagController::class, 'delete'])->name('admin.catalog.tags.delete');
        });

        Route::prefix('type')->group(function() {
            Route::get('/', [App\Http\Controllers\Admin\Catalog\TypeController::class, 'index'])->name('admin.catalog.types');

            Route::post('/create', [App\Http\Controllers\Admin\Catalog\TypeController::class, 'create'])->name('admin.catalog.types.create');
            Route::get('/create', [App\Http\Controllers\Admin\Catalog\TypeController::class, 'create'])->name('admin.catalog.types.create');

            Route::post('/edit/{id}', [App\Http\Controllers\Admin\Catalog\TypeController::class, 'edit'])->name('admin.catalog.types.edit');
            Route::get('/edit/{id}', [App\Http\Controllers\Admin\Catalog\TypeController::class, 'edit'])->name('admin.catalog.types.edit');

            Route::get('/delete/{id}', [App\Http\Controllers\Admin\Catalog\TypeController::class, 'delete'])->name('admin.catalog.types.delete');
        });

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


Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('home');

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
    Route::get('/{slug}', [App\Http\Controllers\Front\CatalogController::class, 'manga'])->name('catalog.manga');
    Route::get('/{slug}/read', [App\Http\Controllers\Front\CatalogController::class, 'readManga'])->name('catalog.manga.read');
    Route::get('/history/{manga)/{chapter}/{page}', [App\Http\Controllers\Front\CatalogController::class, 'readManga'])->name('catalog.manga.user.history');
});

Route::get('/cookie/change-mode/{mode}', [App\Http\Controllers\Front\CookieController::class, 'changeMode']);

Route::prefix('auth')->group(function() {
    Auth::routes();
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('auth.logout');
});



