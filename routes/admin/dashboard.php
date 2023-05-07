<?php


use App\Http\Controllers\Admin\DashboardController;

Route::name('dashboard.')
    ->prefix('dashboard')
    ->group(function () {
        Route::get('', [DashboardController::class, 'index'])
            ->name('index');
    });
