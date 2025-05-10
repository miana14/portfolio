<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\UnifiedApiController;
use App\Http\Controllers\QuoteRequestController;
use App\Http\Controllers\EstimateController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



    Route::get('/', [UnifiedApiController::class, 'index']);

    Route::get('/services', [ServiceController::class, 'index']);
    Route::get('/projects', [ProjectController::class, 'index']);

    Route::post('/estimate', [EstimateController::class, 'calculate']);
    Route::post('/quote-request', [QuoteRequestController::class, 'send']);