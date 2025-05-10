<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\UnifiedApiController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



    Route::get('/', [UnifiedApiController::class, 'index']);

    Route::get('/services', [ServiceController::class, 'index']);
    Route::get('/projects', [ProjectController::class, 'index']);
