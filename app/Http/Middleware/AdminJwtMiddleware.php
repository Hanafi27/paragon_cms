<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Models\Admin;

class AdminJwtMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $authHeader = $request->header('Authorization');
        $token = null;
        if ($authHeader && preg_match('/Bearer\s(.+)/', $authHeader, $matches)) {
            $token = $matches[1];
        } elseif (session()->has('admin_jwt')) {
            $token = session('admin_jwt');
        }
        if (!$token) {
            return redirect('/login');
        }
        try {
            $jwtSecret = env('JWT_SECRET', 'paragonsecretparagonsecretparagonsecr');
            $decoded = JWT::decode($token, new Key($jwtSecret, 'HS256'));
            $admin = Admin::find($decoded->sub ?? null);
            if (!$admin) {
                return redirect('/login');
            }
            // Simpan info admin ke request
            $request->attributes->set('admin', $admin);
        } catch (\Exception $e) {
            return redirect('/login');
        }
        return $next($request);
    }
}
