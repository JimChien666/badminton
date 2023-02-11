<?php

use App\Http\Controllers\Accounts\LoginController;
use App\Http\Controllers\Accounts\RegisterController;
use App\Http\Controllers\Passwords\ResetController;
use App\Http\Controllers\Passwords\UpdateController;
use App\Http\Controllers\PlayingGroups\PostController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'accounts'], function () {
    Route::post('login', LoginController::class)->name('api.accounts.login');
    Route::post('register', RegisterController::class)->name('api.accounts.register');
});

Route::group(['prefix' => 'passwords'], function () {
    Route::post('reset', ResetController::class)->name('api.passwords.reset');
    Route::put('update', UpdateController::class)->name('api.passwords.update');
});

Route::group(['prefix' => 'playing-groups'], function () {
    Route::middleware(['jwt.auth'])->post('', PostController::class)->name('api.playingGroups.post');
});
