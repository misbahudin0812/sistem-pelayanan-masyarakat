<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\DB;

class PengaduanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if(isset($user->id)){
            $pengaduan = DB::table('pengaduans')->where('id_warga',$user->id)->get();
            return view('user.lapor', compact('pengaduan'));
        }
        return redirect()->route('login');
    }

    public function pengaduanadmin()
    {
        $pengaduan = Pengaduan::all();
        return view('admin.pengaduan', compact('pengaduan'));
    }

    public function create()
    {
        return view('user.lapor-tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
                'lampiran' => ['required','mimes:jpeg,png,jpg','max:2048'],
                'detail' => ['required'],
                'perihal' => ['required'],
                'tgl_pengaduan' => ['required'],
            ]);
            $warga = Auth::user();
            // return $validasi;
            //code...
            $pengaduan = new Pengaduan();
            $pengaduan->id_warga = $warga->id;
            $pengaduan->status = 1;
            $pengaduan->perihal = $request->perihal;
            $pengaduan->detail = $request->input('detail');
            $pengaduan->lokasi = $request->input('lokasi');
            $pengaduan->tgl_pengaduan = $request->tgl_pengaduan;
            $gambar = $request->file('lampiran');
            $gambarName = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('lampiran'), $gambarName);
    
            // Simpan path file gambar ke dalam database
            $pengaduan->lampiran = 'lampiran/' . $gambarName;
    
            $pengaduan->save();
    
            return redirect()->route('lapor')->with('success', 'Data staf berhasil ditambahkan.');
    }
    public function gantistatus ($id, $status)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->status = $status;
        $pengaduan->save();
        return redirect()->route('admin.pengaduan');
    }
}
