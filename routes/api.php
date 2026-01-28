<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiKeyController;
use App\Http\Controllers\Api\RfidScanController;

Route::get('/ping', function () {
    return 'pong';
});

// Generate API key (public - requires email/password)
Route::post('/keys/generate', [ApiKeyController::class, 'generate']);

// Protected routes using API key
Route::middleware('api.key')->group(function () {

    Route::get('/record', [RfidScanController::class, 'checkRecord']);
    Route::post('/record', [RfidScanController::class, 'storeRecord']);
});
