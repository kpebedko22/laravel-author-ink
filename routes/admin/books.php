<?php

use App\Http\Controllers\Admin\BookController;
use Illuminate\Support\Facades\Route;

Route::name('books.')
    ->prefix('books')
    ->group(function () {
        Route::get('', [BookController::class, 'index'])
            ->name('index');

        Route::get('/create', [BookController::class, 'create'])
            ->name('create');

        Route::post('', [BookController::class, 'store'])
            ->name('store');

        Route::get('/{book_id}', [BookController::class, 'show'])
            ->name('show');

        Route::get('/{book_id}/edit', [BookController::class, 'edit'])
            ->name('edit');

        Route::put('/{book_id}', [BookController::class, 'update'])
            ->name('update');

        Route::delete('/{book_id}', [BookController::class, 'destroy'])
            ->name('destroy');
    });
