<?php

use App\Http\Controllers\Api\v1\AuthorController;
use Illuminate\Support\Facades\Route;

Route::prefix('authors')
    ->name('authors.')
    ->group(function () {
        Route::get('', [AuthorController::class, 'index'])
            ->name('index');

        Route::get('statistic', [AuthorController::class, 'statistic'])
            ->name('statistic');

        Route::get('{author_id}', [AuthorController::class, 'show'])
            ->name('show');
    });
