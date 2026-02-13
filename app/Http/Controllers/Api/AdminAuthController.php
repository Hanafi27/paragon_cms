<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        $admin = Admin::where('username', $request->username)->first();
        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return response()->json(['error' => 'Username atau password salah'], 401);
        }
        $payload = [
            'sub' => $admin->id,
            'username' => $admin->username,
            'iat' => time(),
            'exp' => time() + (60 * 60 * 24), // 1 hari
        ];
        $jwtSecret = env('JWT_SECRET', 'paragonsecretparagonsecretparagonsecr');
        if (strlen($jwtSecret) < 32) {
            return response()->json(['error' => 'JWT secret key is too short. Minimal 32 karakter.'], 500);
        }
        $jwt = JWT::encode($payload, $jwtSecret, 'HS256');
        return response()->json(['token' => $jwt]);
    }
}
