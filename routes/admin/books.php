<?php

use App\Http\Controllers\Admin\BookController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])
    ->name('books.')
    ->prefix('books')
    ->group(function () {
        Route::get('', [BookController::class, 'index'])
            ->name('index');

        Route::get('/create', [BookController::class, 'create'])
            ->name('create');

        Route::post('', [BookController::class, 'store'])
            ->name('store');

        Route::get('/{bookId}', [BookController::class, 'show'])
            ->name('show');

        Route::get('/{bookId}/edit', [BookController::class, 'edit'])
            ->name('edit');

        Route::put('/{bookId}', [BookController::class, 'update'])
            ->name('update');

        Route::delete('/{bookId}', [BookController::class, 'destroy'])
            ->name('destroy');

    });
