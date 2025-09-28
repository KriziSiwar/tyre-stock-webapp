<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\TestimonialController;
use App\Http\Controllers\Api\StatisticsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API Routes pour la gestion des pneus
Route::prefix('tyres')->group(function () {
    Route::get('/', [App\Http\Controllers\Api\TyreApiController::class, 'index']);
    Route::get('/statistics', [App\Http\Controllers\Api\TyreApiController::class, 'statistics']);
    Route::get('/qr/{qrCode}', [App\Http\Controllers\Api\TyreApiController::class, 'searchByQr']);
    Route::get('/{id}', [App\Http\Controllers\Api\TyreApiController::class, 'show']);
    
    // Routes protégées par authentification
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/', [App\Http\Controllers\Api\TyreApiController::class, 'store']);
        Route::put('/{id}', [App\Http\Controllers\Api\TyreApiController::class, 'update']);
        Route::delete('/{id}', [App\Http\Controllers\Api\TyreApiController::class, 'destroy']);
    });
});

// API v1 Routes
Route::prefix('v1')->group(function () {
    // Services API
    Route::apiResource('services', ServiceController::class);
    
    // Testimonials API
    Route::apiResource('testimonials', TestimonialController::class);
    
    // Statistics API
    Route::prefix('statistics')->group(function () {
        Route::get('/realtime', [StatisticsController::class, 'realtime']);
        Route::get('/all', [StatisticsController::class, 'all']);
        Route::get('/metrics', [StatisticsController::class, 'metrics']);
        Route::get('/performance', [StatisticsController::class, 'performance']);
        Route::get('/charts', [StatisticsController::class, 'charts']);
    });
    
    // Public endpoints (read-only)
    Route::get('public/services', [ServiceController::class, 'index']);
    Route::get('public/testimonials', [TestimonialController::class, 'index']);
    Route::get('public/statistics/realtime', [StatisticsController::class, 'realtime']);
    Route::get('public/statistics/metrics', [StatisticsController::class, 'metrics']);
    Route::get('public/statistics/charts', [StatisticsController::class, 'charts']);
});
