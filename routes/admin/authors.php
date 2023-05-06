<?php

use App\Http\Controllers\Admin\AuthorController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])
    ->name('admin.authors.')
    ->namespace('\App\Http\Controllers\Admin')
    ->group(function () {
        Route::get('/authors', [AuthorController::class, 'index'])->name('index');
        Route::get('/authors/create', [AuthorController::class, 'create'])->name('create');
        Route::post('/authors', [AuthorController::class, 'store'])->name('store');
        Route::get('/authors/{authorId}', [AuthorController::class, 'show'])->name('show');
        Route::get('/authors/{authorId}/edit', [AuthorController::class, 'edit'])->name('edit');
        Route::put('/authors/{authorId}', [AuthorController::class, 'update'])->name('update');
        Route::delete('/authors/{authorId}', [AuthorController::class, 'destroy'])->name('destroy');
    });
