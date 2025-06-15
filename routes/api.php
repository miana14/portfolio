<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UnifiedApiController;
use App\Http\Controllers\QuoteRequestController;
use App\Http\Controllers\EstimateController;
use App\Models\User;

// Authentification API
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Donne les infos de l’utilisateur connecté
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json($request->user());
});

// Routes publiques
Route::get('/', [UnifiedApiController::class, 'index']);
Route::post('/estimate', [EstimateController::class, 'calculate']);

// Routes protégées par token
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/quote-request', [QuoteRequestController::class, 'send']);
});
