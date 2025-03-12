<?php

use App\Http\Controllers\Auth\AuthenticatedTokenController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthenticatedTokenController::class, 'store'])
    ->middleware('guest')
    ->name('login');

Route::post('/logout', [AuthenticatedTokenController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('/categories',CategoryController::class);
    Route::apiResource('/movements',MovementController::class);
});