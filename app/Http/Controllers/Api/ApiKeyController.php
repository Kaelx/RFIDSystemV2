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
            'description' => 'nullable|string|max:255',
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
            'description' => $request->description ?? 'Default Description',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'API key generated successfully',
            'data' => [
                'api_key' => $apiKey->key,
                'description' => $apiKey->description,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ],
                'created_at' => $apiKey->created_at,
            ]
        ], 201);
    }
}
