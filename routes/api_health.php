<?php

use App\Http\Controllers\Health\Alive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/alive', Alive::class)->name('alive');
