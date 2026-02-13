<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryImage;

class GalleryController extends Controller
{
    public function index()
    {
        $images = GalleryImage::orderByDesc('created_at')->get();
        return view('admin.gallery', compact('images'));
    }

    public function create()
    {
        return view('admin.gallery-add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
            'caption' => 'nullable|string|max:255',
        ]);
        $path = $request->file('image')->store('gallery', 'public');
        GalleryImage::create([
            'image_path' => $path,
            'caption' => $request->caption,
        ]);
        return redirect()->route('gallery.index')->with('success', 'Gambar berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $img = GalleryImage::findOrFail($id);
        Storage::disk('public')->delete($img->image_path);
        $img->delete();
        return redirect()->route('gallery.index')->with('success', 'Gambar berhasil dihapus.');
    }
}
