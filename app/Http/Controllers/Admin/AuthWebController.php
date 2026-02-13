<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Firebase\JWT\JWT;

class AuthWebController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $admin = Admin::where('username', $request->username)->first();
        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->with('error', 'Username atau password salah');
        }
        $payload = [
            'sub' => $admin->id,
            'username' => $admin->username,
            'iat' => time(),
            'exp' => time() + (60 * 60 * 24),
        ];
        $jwtSecret = env('JWT_SECRET', 'paragonsecretparagonsecretparagonsecr');
        $jwt = JWT::encode($payload, $jwtSecret, 'HS256');
        // Simpan token ke session agar bisa dipakai middleware
        Session::put('admin_jwt', $jwt);
        return redirect()->route('admin.dashboard');
    }
}
