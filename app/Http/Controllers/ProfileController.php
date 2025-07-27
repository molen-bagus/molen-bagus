<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'avatar'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user->name = $request->name;
        $user->address = $request->address;

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            // Simpan file ke storage/app/public/avatars
            Storage::disk('public')->putFileAs('avatars', $file, $filename);

            // Simpan nama file ke database
            $user->avatar = $filename;

            Log::info('Avatar disimpan di storage/app/public/avatars/' . $filename);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}
