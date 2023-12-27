<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Metode untuk login
    public function register(Request $request)
    {
        // Validasi data
        $request = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($request->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan',
                'errors' => $request->errors()
            ], 422);
        }

        $input = $request->validated();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $token = $user->createToken('api-token')->plainTextToken;


        return response()->json([
            'success' => true,
            'message' => 'Register Sukses',
            'data' => [
                'user' => $user,
                'token' => $token,
            ],
        ], 201);

    }

    // Metode untuk register
    public function login(Request $request)
    {
        // Validasi data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Cek kredensial
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Mengenerate token
            $user = Auth::user();
            $token = Auth::user()->createToken('api-token')->plainTextToken;

            return response()->json(['token' => $token, 'user' => $user], 200);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }
}
