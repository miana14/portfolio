<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UnifiedApiController;
use App\Http\Controllers\QuoteRequestController;
use App\Http\Controllers\EstimateController;

// Récupération de l'utilisateur connecté via Sanctum
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Routes publiques d'accès aux données (lecture uniquement)
Route::get('/', [UnifiedApiController::class, 'index']);

// Routes protégées : estimation et envoi de devis
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/estimate', [EstimateController::class, 'calculate']);
    Route::post('/quote-request', [QuoteRequestController::class, 'send']);
});
