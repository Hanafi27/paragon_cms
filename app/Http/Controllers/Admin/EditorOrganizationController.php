<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organization;

class EditorOrganizationController extends Controller
{
    public function index()
    {
        $organization = Organization::first();
        return view('admin.editor_organization', compact('organization'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method', 'active_tab']);
        $org = Organization::first() ?? new Organization();

        // Handle file uploads
        foreach(['org_chart','founder_img','co_founder_img','team_img'] as $imgField) {
            if ($request->hasFile($imgField)) {
                $file = $request->file($imgField);
                $filename = time().'_'.$file->getClientOriginalName();
                $path = $file->storeAs('uploads', $filename, 'public');
                $org->$imgField = '/storage/'.$path;
            }
        }
        // Text fields
        foreach(['org_intro','founder_name','founder_role','co_founder_name','co_founder_role'] as $field) {
            $org->$field = $request->input($field, null);
        }
        $org->save();
        return redirect()->back()
            ->with('success','Struktur organisasi berhasil diperbarui')
            ->with('active_tab', $request->input('active_tab', 'bagan'));
    }
}
