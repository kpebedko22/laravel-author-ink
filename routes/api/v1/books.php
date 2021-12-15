<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::middleware(['auth:sanctum',])
    ->name('api.v1.books.')
    ->namespace('\App\Http\Controllers')
    ->group(function () {
        Route::post('/books', [BookController::class, 'store'])->name('store');
        Route::patch('/books/{id}', [BookController::class, 'update'])->name('update');
        Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('destroy');
    });
    
Route::name('api.v1.books.')
    ->namespace('\App\Http\Controllers')
    ->group(function(){
        Route::get('/books', [BookController::class, 'index'])->name('index');
        Route::get('/books-with-author-name', [BookController::class, 'booksWithAuthorName'])->name('booksWithAuthorName');
        Route::get('/books/{id}', [BookController::class, 'show'])->name('show');
    });