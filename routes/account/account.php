<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account\WebAccountController;

Route::group(['prefix' => 'account'], function () {
    Route::get('/register', function () {
        return view('account/register');
    });

    Route::get('/login', function () {
        return view('account/login');
    });

    Route::post('/register', [WebAccountController::class, 'register']);

    Route::post('/login', [WebAccountController::class, 'login']);
});
