<?php

use App\Http\Controllers\Admin\AuthorController;
use Illuminate\Support\Facades\Route;

Route::name('authors.')
    ->prefix('authors')
    ->group(function () {
        Route::get('', [AuthorController::class, 'index'])
            ->name('index');

        Route::get('/create', [AuthorController::class, 'create'])
            ->name('create');

        Route::post('', [AuthorController::class, 'store'])
            ->name('store');

        Route::get('/{author_id}', [AuthorController::class, 'show'])
            ->name('show');

        Route::get('/{author_id}/edit', [AuthorController::class, 'edit'])
            ->name('edit');

        Route::put('/{author_id}', [AuthorController::class, 'update'])
            ->name('update');

        Route::delete('/{author_id}', [AuthorController::class, 'destroy'])
            ->name('destroy');

    });
