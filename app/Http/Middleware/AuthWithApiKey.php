<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ApiKey;

class AuthWithApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get API key from request header
        $apiKey = $request->header('X-API-Key');

        // Check if API key exists
        if (!$apiKey) {
            return response()->json([
                'success' => false,
                'message' => 'API key is required'
            ], 401);
        }

        // Find the API key in database
        $keyModel = ApiKey::where('key', $apiKey)->first();

        if (!$keyModel) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid API key'
            ], 401);
        }

        // Update last used timestamp
        $keyModel->markAsUsed();

        // Set the authenticated user (so auth()->user() works)
        auth()->setUser($keyModel->user);


        return $next($request);
    }
}
