<?php

use App\Http\Controllers\Admin\DashboardController;

Route::prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {
        Route::get('', [DashboardController::class, 'index'])
            ->name('index');
    });
