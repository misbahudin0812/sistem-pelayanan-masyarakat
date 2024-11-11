<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
   public function create()
   {
        $staff = Staff::all();
        return view('admin.bagan', compact('staff'));
   }
   public function add()
    {
        return view('bagan.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
                'gambar' => ['image','mimes:jpeg,png,jpg','max:2048'],
                'nip' => ['required','unique:staffs,nip'],
                'nama' => ['required'],
                'jabatan' => ['required'],
                'jenis_kelamin' => ['required'],
            ]);
            // return $validasi;
            //code...
            $staff = new Staff();
            $staff->nip = $request->nip;
            $staff->nama = $request->nama;
            $staff->jabatan = $request->jabatan;
            $staff->jenis_kelamin = $request->jenis_kelamin;
            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . $gambar->getClientOriginalName();
                $gambar->move(public_path('staff'), $gambarName);
                // Simpan path file gambar ke dalam database
                $staff->gambar = 'staff/' . $gambarName;
            }else{
                $staff->gambar = 'staff/' . $request->jenis_kelamin.'.png';
            }
    
            $staff->save();
    
            return redirect()->route('admin.bagan')->with('status', 'Data staf berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $staff = Staff::find($id);
        return view('bagan.edit', compact('staff'));
    }
    
    public function update($id, Request $request)
    {
        $request->validate([
            'gambar' => ['image','mimes:jpeg,png,jpg','max:2048'],
            'nama' => ['required'],
            'jabatan' => ['required'],
            'jenis_kelamin' => ['required'],
        ]);
        $staff = Staff::find($id);
        $staff->nama = $request->nama;
        $staff->jabatan = $request->jabatan;
        $staff->jenis_kelamin = $request->jenis_kelamin;
        // Update file gambar jika diunggah
    if ($request->hasFile('gambar')) {
        // Hapus file gambar lama jika ada
        if ($staff->gambar) {
            unlink(public_path($staff->gambar));
        }

        $gambar = $request->file('gambar');
        $gambarName = time() . '_' . $gambar->getClientOriginalName();
        $gambar->move(public_path('staff'), $gambarName);

        // Simpan path file gambar yang baru ke dalam database
        $staff->gambar = 'staff/' . $gambarName;
    }
        $staff->save();
        return redirect()->route('admin.bagan');
    }

    public function destroy($id)
    {
        $user = Staff::find($id);
        $user->delete();
        return redirect()->route('admin.bagan');
    }

}
