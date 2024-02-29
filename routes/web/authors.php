<?php

use App\Http\Controllers\Web\AuthorController;
use App\Livewire\Authors\ViewAuthor;

Route::resource('authors', AuthorController::class)
    ->only(['index']);

Route::prefix('authors')
    ->name('authors.')
    ->group(function () {
        Route::get('{authorId}', ViewAuthor::class)
            ->name('show');
    });
