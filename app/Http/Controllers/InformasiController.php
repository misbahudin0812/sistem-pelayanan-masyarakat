<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\Informasi;
use Illuminate\Support\Facades\DB;

class InformasiController extends Controller
{
   public function create()
   {
        $informasi = Informasi::all();
        return view('admin.informasi', compact('informasi'));
   }
   public function add()
    {
        return view('informasi.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
                'gambar' => ['image','mimes:jpeg,png,jpg','max:2048'],
                'judul' => ['required'],
                'berita' => ['required'],
                'tgl_berita' => ['required'],
            ]);
            // return $validasi;
            //code...
            $informasi = new Informasi();
            $informasi->judul = $request->judul;
            $informasi->berita = $request->input('berita');
            $informasi->tgl_berita = $request->tgl_berita;
            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . $gambar->getClientOriginalName();
                $gambar->move(public_path('informasi'), $gambarName);
        
                // Simpan path file gambar ke dalam database
                $informasi->gambar = 'informasi/' . $gambarName;
            } else {
                $informasi->gambar = 'informasi/posterberita.jpg';
            }
        
            $informasi->save();
    
            return redirect()->route('admin.informasi')->with('status', 'Informasi berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $informasi = Informasi::find($id);
        return view('informasi.edit', compact('informasi'));
    }
    
    public function update($id, Request $request)
    {
        $request->validate([
            'gambar' => ['image','mimes:jpeg,png,jpg','max:2048'],
            'judul' => ['required'],
                'berita' => ['required'],
                'tgl_berita' => ['required'],
        ]);
        $informasi = Informasi::find($id);
        $informasi->judul = $request->judul;
            $informasi->berita = $request->input('berita');
            $informasi->tgl_berita = $request->tgl_berita;
        // Update file gambar jika diunggah
    if ($request->hasFile('gambar')) {
        // Hapus file gambar lama jika ada
        if ($informasi->gambar) {
            unlink(public_path($informasi->gambar));
        }

        $gambar = $request->file('gambar');
        $gambarName = time() . '_' . $gambar->getClientOriginalName();
        $gambar->move(public_path('informasi'), $gambarName);

        // Simpan path file gambar yang baru ke dalam database
        $informasi->gambar = 'informasi/' . $gambarName;
    }
        $informasi->save();
        return redirect()->route('admin.informasi');
    }
    public function destroy($id)
    {
        $informasi = Informasi::find($id);
        $informasi->delete();
        return redirect()->route('admin.informasi');
    }

}
