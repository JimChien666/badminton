<?php

use App\Http\Controllers\AccountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/hello', function () {
    return "hello";
});

Route::group(['prefix' => 'account'], function () {
    Route::post('login', [AccountController::class, 'login']);
    Route::post('register', [AccountController::class, 'register']);
    Route::middleware(['jwt.auth'])->get('', [AccountController::class, 'show']);
});
