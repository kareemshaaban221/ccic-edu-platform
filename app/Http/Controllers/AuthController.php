<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request) {
        $validated = $request->validate([
            'username' => 'required|string|exists:users,username',
            'password' => 'required',
        ]);

        $user = User::where('username', $validated['username'])->first();

        if (Hash::check($validated['password'], $user->password)) {

            $user->tokens()->delete();

            $token = $user->createToken('auth_token')->plainTextToken;
            $auth = [
                'user' => $user,
                'token' => $token
            ];

            return response()->json([
                'message' => 'Logged in successfully',
                'data' => $auth
            ]);
        } else {
            return response()->json([
                    'message' => 'wrong password'
                ], 422);
        }
    }

    public function register(RegisterRequest $request) {
        $validated = $request->validated();
        $user = User::create($validated);
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message' => 'User created successfully',
            'data' => [
                'user' => $user,
                'token' => $token
            ]
        ], Response::HTTP_CREATED);
    }

    public function logout()
    {
        // user should be logged in (authenticated)
        $user = auth()->user();
        $user->tokens()->delete();
        return response()->json([
            'message' => 'logged out successfully'
        ]);
    }

}
