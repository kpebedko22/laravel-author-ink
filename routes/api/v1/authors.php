<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\AuthorController;

Route::middleware(['auth:sanctum',])
    ->name('api.v1.authors.')
    ->namespace('\App\Http\Controllers')
    ->group(function () {
        Route::patch('/authors/{id}', [AuthorController::class, 'update'])->name('update');
    });


Route::name('api.v1.authors.')
    ->namespace('\App\Http\Controllers')
    ->group(function () {
        Route::get('/authors', [AuthorController::class, 'index'])->name('index');
        Route::get('/authors-with-books', [AuthorController::class, 'authorsWithBooks'])->name('authorsWithBooks');
        Route::get('/authors-with-books-count', [AuthorController::class, 'authorsWithBooksCount'])->name('authorsWithBooksCount');
        Route::get('/authors/{id}', [AuthorController::class, 'show'])->name('show');
    });
