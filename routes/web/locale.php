<?php

use App\Http\Controllers\Web\LocaleController;

Route::prefix('locale')
    ->name('locale.')
    ->group(function () {
        Route::post('', [LocaleController::class, 'store'])
            ->name('store');
    });
