<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\ChatbotIntent;
use App\Models\GalleryImage;
use App\Models\Visit;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Data statistik dinamis
        $stats = [
            'total_users' => User::count(),
            'total_products' => Product::count(),
            'total_faq' => ChatbotIntent::count(),
            'total_gallery' => GalleryImage::count(),
        ];

        // Data visitor harian 14 hari terakhir
        $visitorChart = Visit::select(DB::raw('visited_at, COUNT(*) as total'))
            ->whereBetween('visited_at', [now()->subDays(13)->toDateString(), now()->toDateString()])
            ->groupBy('visited_at')
            ->orderBy('visited_at')
            ->get();

        // Data perangkat visitor 14 hari terakhir
        $deviceChart = Visit::select(DB::raw('device, COUNT(*) as total'))
            ->whereBetween('visited_at', [now()->subDays(13)->toDateString(), now()->toDateString()])
            ->groupBy('device')
            ->get();

        // Ambil 5 aktivitas admin terbaru (misal: update produk, tambah FAQ, dsb)
        $adminActivities = DB::table('activity_log')
            ->where('causer_type', 'App\\Models\\User')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'visitorChart', 'deviceChart', 'adminActivities'));
    }
}
