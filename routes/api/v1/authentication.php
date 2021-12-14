<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

Route::middleware([])
    ->name('authentication.')
    ->namespace('\App\Http\Controllers')
    ->group(function () {
        Route::post('/sign-up', [AuthenticationController::class, 'signUp'])->name('signUp');
        Route::post('/sign-in', [AuthenticationController::class, 'signIn'])->name('signIn');
    });

Route::middleware(['auth:sanctum'])
    ->name('authentication.')
    ->namespace('\App\Http\Controllers')
    ->group(function () {
        Route::post('/sign-out', [AuthenticationController::class, 'signOut'])->name('signOut');
    });
