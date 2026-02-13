<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomepageSection;

class HomepageSectionController extends Controller
{
    public function update(Request $request)
    {
        $data = $request->validate([
            'section' => 'required|string',
            'key'     => 'required|string',
            'value'   => 'nullable|string',
            'type'    => 'nullable|string',
        ]);
        HomepageSection::updateOrCreate(
            ['section' => $data['section'], 'key' => $data['key']],
            ['value' => $data['value'], 'type' => $data['type'] ?? 'text']
        );
        return response()->json(['success' => true]);
    }
}
