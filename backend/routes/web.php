<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::apiResource('api/example', \App\Http\Controllers\ApiController::class);
Route::apiResource('api/token', \App\Http\Controllers\TokenController::class);