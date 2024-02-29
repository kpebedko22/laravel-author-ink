<?php

use App\Http\Controllers\Web\AuthController;

Route::name('auth.')
    ->group(function () {
        Route::get('login', [AuthController::class, 'create'])
            ->middleware(['guest'])
            ->name('login');

        Route::post('logout', [AuthController::class, 'destroy'])
            ->middleware(['auth:web'])
            ->name('logout');
    });
