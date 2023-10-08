<?php

use App\Http\Controllers\Admin\LocaleController;

Route::name('locale.')
    ->prefix('locale')
    ->group(function () {
        Route::post('', [LocaleController::class, 'store'])
            ->name('store');
    });
