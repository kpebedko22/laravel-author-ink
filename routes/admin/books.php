<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\BookController;


Route::middleware(['auth'])
    ->name('admin.books.')
    ->namespace('\App\Http\Controllers\Admin')
    ->group(function () {
        Route::get('/books', [BookController::class, 'index'])->name('index');
    });
