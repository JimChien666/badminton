<?php

use App\Http\Controllers\Account\LoginController;
use App\Http\Controllers\Account\RegisterController;
use App\Http\Controllers\Password\ResetController;
use App\Http\Controllers\Password\UpdateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'account'], function () {
    Route::post('login', LoginController::class)->name('api.account.login');
    Route::post('register', RegisterController::class)->name('api.account.register');
});

Route::group(['prefix' => 'password'], function () {
    Route::put('reset', ResetController::class)->name('password.reset');
    Route::put('update', UpdateController::class)->name('password.update');
});
