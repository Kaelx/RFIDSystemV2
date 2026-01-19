<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Api\ApiKeyController;

Route::get('/ping', function () {
    return 'pong';
});

// Generate API key (public - requires email/password)
// Route::post('/keys/generate', [ApiKeyController::class, 'generate']);

// // Protected routes using API key
// Route::middleware(['api.key', 'throttle:api'])->group(function () {

//     // API Key management
//     Route::get('/keys', [ApiKeyController::class, 'index']);
//     Route::delete('/keys/{id}', [ApiKeyController::class, 'revoke']);
// });
