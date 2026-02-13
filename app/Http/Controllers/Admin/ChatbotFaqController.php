<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatbotIntent;
use App\Models\ChatbotKeyword;
use App\Models\ChatbotQuickAction;

class ChatbotFaqController extends Controller
{
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        if (!empty($ids)) {
            foreach ($ids as $id) {
                $faq = ChatbotIntent::find($id);
                if ($faq) {
                    $faq->keywords()->delete();
                    $faq->delete();
                }
            }
            return redirect()->route('faq.index')->with('success', 'FAQ terpilih berhasil dihapus.');
        } else {
            return redirect()->route('faq.index')->with('error', 'Tidak ada FAQ yang dipilih untuk dihapus.');
        }
    }
    public function index()
    {
        $faqs = ChatbotIntent::with('keywords')->orderByDesc('created_at')->get();
        return view('admin.faq', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faq-add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'response_type' => 'required|in:text,link',
            'response_text' => 'nullable|string',
            'response_url' => 'nullable|string',
            'status' => 'required|in:aktif,draft',
            'keywords' => 'nullable|string',
        ]);

        $intent = ChatbotIntent::create($request->only([
            'name','response_type','response_text','response_url','response_json','status'
        ]));

        // Proses keywords (string dipisah koma)
        $keywords = collect(explode(',', $request->keywords))
            ->map(fn($k) => trim($k))
            ->filter()
            ->unique();
        foreach ($keywords as $keyword) {
            ChatbotKeyword::create([
                'intent_id' => $intent->id,
                'keyword' => $keyword,
            ]);
        }

        return redirect()->route('faq.index')->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $faq = ChatbotIntent::with('keywords')->findOrFail($id);
        return view('admin.faq-edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $faq = ChatbotIntent::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:100',
            'response_type' => 'required|in:text,link',
            'response_text' => 'nullable|string',
            'response_url' => 'nullable|string',
            'status' => 'required|in:aktif,draft',
            'keywords' => 'nullable|string',
        ]);
        $faq->update($request->only(['name','response_type','response_text','response_url','response_json','status']));
        // Update keywords
        $faq->keywords()->delete();
        $keywords = collect(explode(',', $request->keywords))
            ->map(fn($k) => trim($k))
            ->filter()
            ->unique();
        foreach ($keywords as $keyword) {
            $faq->keywords()->create(['keyword' => $keyword]);
        }
        return redirect()->route('faq.index')->with('success', 'FAQ berhasil diupdate.');
    }

    public function destroy($id)
    {
        $faq = ChatbotIntent::findOrFail($id);
        $faq->keywords()->delete();
        $faq->delete();
        return redirect()->route('faq.index')->with('success', 'FAQ berhasil dihapus.');
    }
}
