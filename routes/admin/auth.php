<?php

use App\Http\Controllers\Admin\Auth\AuthController;

Route::name('auth')
    ->group(function () {

        Route::get('login', [AuthController::class, 'index'])
            ->name('index');

        Route::post('login', [AuthController::class, 'login'])
            ->name('login');

        Route::post('logout', [AuthController::class, 'logout'])
            ->name('logout');

    });
