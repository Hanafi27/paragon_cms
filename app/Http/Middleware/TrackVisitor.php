<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visit;
use Jenssegers\Agent\Agent;

class TrackVisitor
{
    public function handle(Request $request, Closure $next)
    {
        // Cek hanya untuk halaman publik
        if (!$request->is('admin/*')) {
            $agent = new Agent();
            $agent->setUserAgent($request->userAgent());
            $device = $agent->isMobile() ? 'Mobile' : ($agent->isTablet() ? 'Tablet' : 'Desktop');

            Visit::create([
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'device' => $device,
                'visited_at' => now()->toDateString(),
            ]);
        }
        return $next($request);
    }
}
