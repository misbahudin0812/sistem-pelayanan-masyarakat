<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileDesa;

class ProfileDesaController extends Controller
{
    public function create()
    {
        $profile = ProfileDesa::first();
        return view('admin.profile', compact('profile'));
    }

    public function add()
    {
        return view('masyarakat.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => ['required', 'numeric', 'digits_between:1,16', 'unique:users,nik'],
            'nohandphone' => ['required', 'numeric', 'digits_between:1,16'],
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'nik' => $request->nik,
            'nohandphone' => $request->nohandphone,
            'email' => fake()->unique()->safeEmail(),
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'role' => 'masyarakat'
        ]);

        return redirect()->route('admin.masyarakat');
    }

    public function edit($id)
    {
        $profile = ProfileDesa::where('id', $id)->first();
        return view('profile-desa.edit', compact('profile'));
    }

    public function update($id, Request $request)
    {
        $profile = ProfileDesa::find($id);
        $profile->tentang_desa = $request->tentang_desa;
        $profile->visi = $request->visi;
        $profile->misi = $request->input('misi');
        if ($request->hasFile('gambar')) {
            // Hapus file gambar lama jika ada
            if ($profile->gambar) {
                if(file_exists(public_path($profile->gambar))){
                    unlink(public_path($profile->gambar));
                }
            }
    
            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('profile'), $gambarName);
    
            // Simpan path file gambar yang baru ke dalam database
            $profile->gambar = 'profile/' . $gambarName;
        }
        $profile->link_peta = $request->link_peta;
        $profile->save();
        return redirect()->route('admin.profile');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.masyarakat');
    }
}
