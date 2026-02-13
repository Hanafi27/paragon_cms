<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin;

class SettingsController extends Controller
{
    public function update(Request $request)
    {
        $admin = $request->attributes->get('admin');
        $request->validate([
            'username' => 'required|string|max:255|unique:admins,username,' . $admin->id,
            'password' => 'nullable|string|min:6',
            'photo' => 'nullable|image|max:2048',
        ]);
        $admin->username = $request->username;
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }
        if ($request->hasFile('photo')) {
            if ($admin->photo) {
                Storage::delete($admin->photo);
            }
            $admin->photo = $request->file('photo')->store('admin_photos', 'public');
        }
        $admin->save();
        return back()->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
