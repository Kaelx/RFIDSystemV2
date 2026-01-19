<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApiKey;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class ApiKeyController extends Controller
{
    /**
     * Generate a new API key
     * POST /api/keys/generate
     */
    public function generate(Request $request)
    {
        // Validate credentials
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Find user by email
        $user = User::where('email', $request->email)->first();

        // Check if user exists and password is correct
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials'
            ], 401);
        }

        // Generate API key
        $apiKey = ApiKey::create([
            'user_id' => $user->id,
            'key' => ApiKey::generate(),
            'name' => $request->name ?? 'Default Key',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'API key generated successfully',
            'data' => [
                'api_key' => $apiKey->key,
                'name' => $apiKey->name,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ],
                'created_at' => $apiKey->created_at,
            ]
        ], 201);
    }

    /**
     * List all API keys for authenticated user
     * GET /api/keys
     */
    public function index(Request $request)
    {
        $keys = $request->user()->apiKeys()
            ->select('id', 'name', 'key', 'last_used_at', 'created_at')
            ->get();

        // Mask keys for security (show only last 8 characters)
        $keys->transform(function ($key) {
            return [
                'id' => $key->id,
                'name' => $key->name,
                'key' => '***************' . substr($key->key, -8),
                'last_used_at' => $key->last_used_at,
                'created_at' => $key->created_at,
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $keys
        ]);
    }

    /**
     * Revoke (delete) an API key
     * DELETE /api/keys/{id}
     */
    public function revoke(Request $request, $id)
    {
        $apiKey = $request->user()->apiKeys()->find($id);

        if (!$apiKey) {
            return response()->json([
                'success' => false,
                'message' => 'API key not found'
            ], 404);
        }

        $apiKey->delete();

        return response()->json([
            'success' => true,
            'message' => 'API key revoked successfully'
        ]);
    }
}
