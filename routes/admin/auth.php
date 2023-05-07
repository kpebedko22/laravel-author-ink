<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::name('auth.')
    ->group(function () {

        Route::prefix('login')
            ->middleware([
                'guest:web'
            ])
            ->group(function () {

                Route::get('', [AuthController::class, 'index'])
                    ->name('index');

                Route::post('', [AuthController::class, 'login'])
                    ->name('login');
            });

        Route::post('logout', [AuthController::class, 'logout'])
            ->middleware([
                'auth:web',
            ])
            ->name('logout');
    });
