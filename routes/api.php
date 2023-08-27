<?php

use Illuminate\Support\Facades\Route;

Route::name('api.')
    ->group(function () {

        Route::prefix('v1')
            ->name('v1.')
            ->group(function () {
                require __DIR__ . '/api/v1/auth.php';
                require __DIR__ . '/api/v1/books.php';
                require __DIR__ . '/api/v1/authors.php';
            });
    });
