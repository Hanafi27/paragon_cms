<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomepageSectionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ChatbotFaqController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisionMissionController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\Admin\EditorOrganizationController;
use App\Http\Controllers\Admin\LandingPageController;

// ================= ADMIN ROUTES =================
Route::prefix('admin')->middleware('admin.jwt')->group(function () {

    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    // Homepage Section Editor
    Route::get('/editor/beranda', [LandingPageController::class, 'index'])->name('admin.editor.beranda');
    Route::post('/editor/beranda', [LandingPageController::class, 'update'])->name('admin.homepage.update');

    // Vision Mission Editor
    Route::get('/editor/visi-misi', [VisionMissionController::class, 'edit'])->name('admin.editor.vision');
    Route::post('/editor/visi-misi', [VisionMissionController::class, 'update'])->name('admin.vision-mission.update');

    // Organization Editor
    Route::get('/editor/struktur-organisasi', [EditorOrganizationController::class, 'index'])->name('admin.editor.organization');
    Route::post('/editor/struktur-organisasi', [EditorOrganizationController::class, 'update'])->name('admin.organization.update');

    // Kelola Produk
    Route::resource('/product', ProductController::class)->except(['show']);
    
    // Kelola Gallery
    Route::resource('/gallery', GalleryController::class);

    // Kelola FAQ Chatbot
    Route::resource('/faq', ChatbotFaqController::class);
    Route::delete('/admin/faq/bulk-delete', [ChatbotFaqController::class, 'bulkDelete'])->name('faq.bulkDelete');

    // Kelola Tema & Event
    Route::view('/theme-event', 'admin.theme-event')->name('admin.theme-event');
    
    // Review CRUD Routes
    Route::resource('/review', App\Http\Controllers\Admin\LandingPageController::class, ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // API routes for chatbot intents
    Route::get('/api/chatbot/intents', [ChatbotController::class, 'intents']);

    // Settings
    Route::get('/settings', function() { return view('admin.settings'); })->name('admin.settings');
    Route::post('/settings', [\App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('admin.settings.update');
});

// ================= PUBLIC ROUTES =================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/tentang-kami', 'about')->name('about');
Route::get('/visi-misi', [VisionMissionController::class, 'index'])->name('vision-mission');
Route::get('/struktur-organisasi', [OrganizationController::class, 'index'])->name('organization');
Route::view('/produk', 'products')->name('products');
Route::get('/produk/detail/{id}', function ($id) {
    $product = \App\Models\Product::with('galleries')->findOrFail($id);
    return view('product-detail', compact('product'));
})->name('product.detail');
Route::view('/mitra', 'partners')->name('partners');
Route::view('/ulasan', 'reviews')->name('reviews');
Route::get('/galeri', function () {
    $images = \App\Models\GalleryImage::orderByDesc('created_at')->get();
    return view('gallery', compact('images'));
})->name('gallery');
Route::view('/kontak', 'contact')->name('contact');

// ================= AUTH ROUTES =================

// Login page
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Proses login admin (POST)
Route::post('/login', [\App\Http\Controllers\Admin\AuthWebController::class, 'login'])->name('login');

Route::post('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/login');
})->name('logout');
