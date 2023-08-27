<?php

use App\Http\Controllers\Api\v1\BookController;
use Illuminate\Support\Facades\Route;

Route::prefix('books')
    ->name('books.')
    ->whereNumber([
        'book_id'
    ])
    ->group(function () {
        Route::get('', [BookController::class, 'index'])
            ->name('index');

        Route::post('', [BookController::class, 'store'])
            ->middleware(['auth:sanctum'])
            ->name('store');

        Route::get('{book_id}', [BookController::class, 'show'])
            ->name('show');

        Route::put('{book_id}', [BookController::class, 'update'])
            ->middleware(['auth:sanctum'])
            ->name('update');

        Route::delete('{book_id}', [BookController::class, 'delete'])
            ->middleware(['auth:sanctum'])
            ->name('delete');
    });
