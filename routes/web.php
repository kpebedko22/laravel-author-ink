<?php

Route::get('', function () {
    return redirect()->route('admin.auth.login');
});

Route::prefix('')
    ->name('web.')
    ->group(function () {
    });
