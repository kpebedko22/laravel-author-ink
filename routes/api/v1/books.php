<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::middleware(['auth:sanctum',])
    ->name('books.')
    ->namespace('\App\Http\Controllers')
    ->group(function () {
        Route::post('/books', [BookController::class, 'store'])->name('store');
        Route::patch('/books/{id}', [BookController::class, 'update'])->name('update')->middleware('can:update,book');
        Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('destroy')->middleware('can:delete-book,book');
    });
    
Route::name('books.')
    ->namespace('\App\Http\Controllers')
    ->group(function(){
        Route::get('/books', [BookController::class, 'index'])->name('index');
        Route::get('/books-with-author-name', [BookController::class, 'booksWithAuthorName'])->name('booksWithAuthorName');
        Route::get('/books/{id}', [BookController::class, 'show'])->name('show');
    });