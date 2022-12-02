<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')
    ->name('admin.')
    ->middleware([

    ])
    ->group(function () {
        require __DIR__ . '/web/admin/auth.php';
        require __DIR__ . '/web/admin/books.php';
    });

Route::prefix('')
    ->name('')
    ->middleware([

    ])
    ->group(function () {

    });
