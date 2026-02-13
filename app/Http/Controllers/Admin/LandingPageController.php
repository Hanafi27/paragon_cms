<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    // CRUD Review
    public function createReview()
    {
        return view('admin.review_create');
    }

    public function storeReview(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'company' => 'nullable',
            'message' => 'required',
            'stars' => 'required|integer|min:1|max:5',
            'badge' => 'nullable',
        ]);
        \App\Models\Review::create($validated);
        return redirect()->route('admin.editor.beranda')->with('success', 'Ulasan berhasil ditambah');
    }

    public function editReview($id)
    {
        $review = \App\Models\Review::findOrFail($id);
        return view('admin.review_edit', compact('review'));
    }

    public function updateReview(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'company' => 'nullable',
            'message' => 'required',
            'stars' => 'required|integer|min:1|max:5',
            'badge' => 'nullable',
        ]);
        $review = \App\Models\Review::findOrFail($id);
        $review->update($validated);
        return redirect()->route('admin.editor.beranda')->with('success', 'Ulasan berhasil diupdate');
    }

    public function destroyReview($id)
    {
        $review = \App\Models\Review::findOrFail($id);
        $review->delete();
        return redirect()->route('admin.editor.beranda')->with('success', 'Ulasan berhasil dihapus');
    }

    public function index()
    {
        $contents = \App\Models\LandingPage::getAllContent();
        $reviews = \App\Models\Review::all();
        return view('admin.editor_beranda', compact('contents', 'reviews'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method']);
        $activeTab = $request->input('active_tab', 'hero');
        foreach ($data as $key => $value) {
            if ($key === 'active_tab') continue;
            $type = 'text';
            // Cek field logo mitra
            if (str_contains($key, 'image') || str_contains($key, 'mitra_logo')) {
                $type = 'image';
                if ($request->hasFile($key)) {
                    $file = $request->file($key);
                    $filename = time().'_'.$file->getClientOriginalName();
                    $path = $file->storeAs('uploads', $filename, 'public');
                    $value = '/storage/'.$path;
                }
            } else if (str_contains($key, 'desc') || str_contains($key, 'message')) {
                $type = 'textarea';
            }
            if (is_null($value)) $value = '';
            \App\Models\LandingPage::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'type' => $type]
            );
        }
        return redirect()->back()->with('success', 'Konten berhasil diperbarui')->with('active_tab', $activeTab);
    }
}
