<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\AuthenticationController;

Route::middleware([])
    ->name('api.v1.authentication.')
    ->namespace('\App\Http\Controllers')
    ->group(function () {
        Route::post('/sign-up', [AuthenticationController::class, 'signUp'])->name('signUp');
        Route::post('/sign-in', [AuthenticationController::class, 'signIn'])->name('signIn');
    });

Route::middleware(['auth:sanctum'])
    ->name('api.v1.authentication.')
    ->namespace('\App\Http\Controllers')
    ->group(function () {
        Route::post('/sign-out', [AuthenticationController::class, 'signOut'])->name('signOut');
    });
