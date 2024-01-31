<?php

Route::get('', function () {
    return view('web.index');
});

Route::prefix('')
    ->name('web.')
    ->group(function () {
        require __DIR__ . '/web/books.php';
    });
