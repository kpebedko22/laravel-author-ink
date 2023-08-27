<?php

use App\Http\Controllers\Web\BookController;
use Illuminate\Support\Facades\Route;

Route::name('books.')
    ->prefix('books')
    ->group(function () {
        Route::get('', [BookController::class, 'index'])
            ->name('index');

        Route::get('{book_id}', [BookController::class, 'show'])
            ->name('show');
    });
