<?php

Route::prefix('')
    ->domain('')
    ->name('web.')
    ->group(function () {

        Route::view('', 'web.index')->name('index');

        require __DIR__ . '/web/books.php';
    });
