<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BookController;

Route::middleware(['auth'])
    ->name('admin.books.')
    ->namespace('\App\Http\Controllers\Admin')
    ->group(function () {
        Route::get('/books', [BookController::class, 'index'])->name('index');
        Route::get('/books/create', [BookController::class, 'create'])->name('create');
        Route::post('/books', [BookController::class, 'store'])->name('store');
        Route::get('/books/{bookId}', [BookController::class, 'show'])->name('show');
        Route::get('/books/{bookId}/edit', [BookController::class, 'edit'])->name('edit');
        Route::put('/books/{bookId}', [BookController::class, 'update'])->name('update');
        Route::delete('/books/{bookId}', [BookController::class, 'destroy'])->name('destroy');
    });
