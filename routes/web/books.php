<?php

use App\Http\Controllers\Web\BookController;

Route::resource('books', BookController::class)
    ->only(['index', 'show']);
