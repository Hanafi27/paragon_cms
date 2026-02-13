<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function update(Request $request, $id)
    {
        $product = Product::with('galleries')->findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'main_image' => 'nullable|image|max:2048',
            'code' => 'nullable|string|max:255',
            'stock' => 'nullable|string|max:255',
            'certification' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'gallery' => 'array|max:4',
            'gallery.*' => 'image|max:2048',
            'keep_galleries' => 'array',
            'delete_galleries' => 'array',
        ]);

        // Update main image jika ada upload baru
        if ($request->hasFile('main_image')) {
            // Hapus gambar lama
            if ($product->main_image) {
                Storage::disk('public')->delete($product->main_image);
            }
            $mainImagePath = $request->file('main_image')->store('products', 'public');
            $product->main_image = $mainImagePath;
        }

        // Update data produk
        $product->name = $request->name;
        $product->category = $request->category;
        $product->code = $request->code;
        $product->stock = $request->stock;
        $product->certification = $request->certification;
        $product->description = $request->description;
        $product->save();

        // Hapus galeri yang dihapus user
        if ($request->has('delete_galleries')) {
            foreach ($request->delete_galleries as $galleryId) {
                $gallery = $product->galleries()->find($galleryId);
                if ($gallery) {
                    Storage::disk('public')->delete($gallery->image_path);
                    $gallery->delete();
                }
            }
        }

        // Tambah galeri baru
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $galleryPath = $file->store('product-galleries', 'public');
                $product->galleries()->create(['image_path' => $galleryPath]);
            }
        }

        return redirect()->route('product.index')->with('success', 'Produk berhasil diupdate.');
    }
    public function edit($id)
    {
        $product = Product::with('galleries')->findOrFail($id);
        return view('admin.product-edit', compact('product'));
    }
    public function index()
    {
        $products = Product::with('galleries')->latest()->get();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        return view('admin.product-add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // 'slug' dihapus
            'category' => 'nullable|string|max:255',
            'main_image' => 'required|image|max:2048',
            'code' => 'nullable|string|max:255',
            'stock' => 'nullable|string|max:255',
            'certification' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'gallery' => 'array|max:4',
            'gallery.*' => 'image|max:2048',
        ]);
        $mainImagePath = $request->file('main_image')->store('products', 'public');
        $product = Product::create([
            'name' => $request->name,
            // 'slug' dihapus
            'category' => $request->category,
            'main_image' => $mainImagePath,
            'code' => $request->code,
            'stock' => $request->stock,
            'certification' => $request->certification,
            'description' => $request->description,
        ]);
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $galleryPath = $file->store('product-galleries', 'public');
                $product->galleries()->create(['image_path' => $galleryPath]);
            }
        }
        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        Storage::disk('public')->delete($product->main_image);
        foreach ($product->galleries as $gallery) {
            Storage::disk('public')->delete($gallery->image_path);
        }
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus.');
    }
}
