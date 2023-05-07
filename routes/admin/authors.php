<?php

use App\Http\Controllers\Admin\AuthorController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])
    ->name('authors.')
    ->prefix('authors')
    ->group(function () {
        Route::get('', [AuthorController::class, 'index'])
            ->name('index');

        Route::get('/create', [AuthorController::class, 'create'])
            ->name('create');

        Route::post('', [AuthorController::class, 'store'])
            ->name('store');

        Route::get('/{authorId}', [AuthorController::class, 'show'])
            ->name('show');

        Route::get('/{authorId}/edit', [AuthorController::class, 'edit'])
            ->name('edit');

        Route::put('/{authorId}', [AuthorController::class, 'update'])
            ->name('update');

        Route::delete('/{authorId}', [AuthorController::class, 'destroy'])
            ->name('destroy');

    });
