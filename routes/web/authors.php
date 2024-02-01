<?php

use App\Http\Controllers\Web\AuthorController;

Route::resource('authors', AuthorController::class)
    ->only(['index', 'show']);
