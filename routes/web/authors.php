<?php

use App\Livewire\Authors\ListAuthors;
use App\Livewire\Authors\ViewAuthor;

Route::prefix('authors')
    ->name('authors.')
    ->group(function () {
        Route::get('', ListAuthors::class)
            ->name('index');

        Route::get('{authorId}', ViewAuthor::class)
            ->name('show');
    });
