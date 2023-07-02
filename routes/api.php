<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\AnimalController;

Route::middleware('auth:sanctum')->group(function () {
    // Allow only "GET" requests for /farms
    Route::get('/farms', [FarmController::class, 'index']);

    // Allow only "GET" and "POST" requests for resource routes
    Route::resource('farms', FarmController::class)->only(['index', 'store']);
    Route::resource('farms.animals', AnimalController::class)->only(['index', 'store']);
});
