<?php

use App\Http\Controllers\Auth\AuthenticatedTokenController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('/users', UserController::class);

Route::post('/login', [AuthenticatedTokenController::class, 'store'])
    ->middleware('guest')
    ->name('login');

Route::post('/logout', [AuthenticatedTokenController::class, 'destroy']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('/categories',CategoryController::class);
    Route::apiResource('/movements',MovementController::class);
});