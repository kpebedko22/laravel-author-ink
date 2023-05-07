<?php

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        require __DIR__ . '/admin/auth.php';

        Route::middleware(['auth:web'])
            ->group(function () {
                require __DIR__ . '/admin/dashboard.php';
                require __DIR__ . '/admin/books.php';
                require __DIR__ . '/admin/authors.php';
            });
    });
