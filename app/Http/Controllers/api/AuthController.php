<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required|string|min:6",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if ($user = User::where("email", $request->email)->first()) {
            if (Hash::check($request->password, $user->password)) {
                return response()->json([
                    "message" => "Login successful",
                    "user" => $user,
                    "token" => $user->createToken("auth_token")->plainTextToken,
                ]);
            }
        }

        return response()->json(["error" => "Unauthorized"], 401);
    }

    public function logout(Request $request)
    {
        // Revoke the user's token
        $request->user()->tokens()->delete();
        return response()->json(["message" => "Logged out successfully"]);
    }
}
