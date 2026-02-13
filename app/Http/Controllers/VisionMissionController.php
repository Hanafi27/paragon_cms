<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisionMission;

class VisionMissionController extends Controller
{
    public function index()
    {
        $visionMission = VisionMission::first();
        return view('vision-mission', compact('visionMission'));
    }

    public function edit()
    {
        $visionMission = VisionMission::first();
        return view('admin.editor_vision', compact('visionMission'));
    }

    public function update(Request $request)
    {
        $data = $request->only(['intro', 'visi', 'misi']);
        $visionMission = VisionMission::first();
        if (!$visionMission) {
            $visionMission = new VisionMission();
        }
        $visionMission->intro = $data['intro'];
        $visionMission->visi = $data['visi'];
        $visionMission->misi = $data['misi'];
        $visionMission->save();
        return redirect()->route('admin.editor.vision')->with('success', 'Data berhasil disimpan!')->with('active_tab', $request->input('active_tab', 'intro'));
    }
}
