<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\UserProfile;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $profile = UserProfile::firstOrNew(['user_id' => (string) $user->id]);
        return view('layouts.profile', compact('user', 'profile'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'nik' => [
                'required',
                'string',
                'digits:16',
                Rule::unique('user_profiles')->ignore((string) $user->id, 'user_id'),
            ],
            'namaLengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Pria,Wanita',
            'pekerjaan' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

       $profile = UserProfile::where('user_id', (string) $user->id)->first();

        if ($request->hasFile('image')) {
            if ($profile && $profile->image) {
                Storage::disk('public')->delete($profile->image);
            }
            $imagePath = $request->file('image')->store('profile_images', 'public');
        } else {
            $imagePath = $profile ? $profile->image : null;
        }
        UserProfile::updateOrCreate(
            ['user_id' => (string) $user->id],
            [
                'nik' => $request->nik,
                'nama_lengkap' => $request->namaLengkap,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'pekerjaan' => $request->pekerjaan,
                'alamat' => $request->alamat,
                'image' => $imagePath,
            ]
        );

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
    }
}