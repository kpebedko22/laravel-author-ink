<?php

use App\Http\Controllers\Admin\Books\BookController;

Route::prefix('books')
    ->name('books.')
    ->middleware([
        'auth:admin'
    ])
    ->whereNumber([
        'book_id'
    ])
    ->group(function () {
        Route::get('', [BookController::class, 'index'])
            ->name('index');

        Route::post('', [BookController::class, 'store'])
            ->name('store');

        Route::get('create', [BookController::class, 'create'])
            ->name('create');

        Route::get('{book_id}', [BookController::class, 'show'])
            ->name('show');

        Route::get('{book_id}/edit', [BookController::class, 'edit'])
            ->name('edit');

        Route::put('{book_id}', [BookController::class, 'update'])
            ->name('update');

        Route::delete('{book_id}', [BookController::class, 'delete'])
            ->name('delete');

        Route::post('{book_id}/restore', [BookController::class, 'restore'])
            ->name('restore');

        Route::delete('{book_id}/destroy', [BookController::class, 'destroy'])
            ->name('destroy');
    });
