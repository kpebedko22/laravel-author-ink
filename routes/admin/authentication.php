<?php

use App\Http\Controllers\Admin\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::middleware([])
    ->name('admin.authentication.')
    ->namespace('\App\Http\Controllers\Admin')
    ->group(function () {

        Route::get('/sign-in', [AuthenticationController::class, 'index'])->name('index');

        Route::post('/sign-in', [AuthenticationController::class, 'signIn'])->name('signIn');
    });

Route::middleware(['auth'])
    ->name('admin.authentication.')
    ->namespace('\App\Http\Controllers\Admin')
    ->group(function () {
        Route::get('/account', [AuthenticationController::class, 'account'])->name('account');
        Route::get('/sign-out', [AuthenticationController::class, 'signOut'])->name('signOut');
    });
