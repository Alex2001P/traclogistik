<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/viajes/{id}', [\App\Http\Controllers\ViajesController::class, 'getViaje']);
Route::post('/tracking', [\App\Http\Controllers\ViajesController::class, 'saveTracking']);
