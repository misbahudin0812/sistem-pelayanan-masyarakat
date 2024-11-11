<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Surat;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SuratController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if(isset($user->nik)){
            $surat = DB::table('surats')->where('nik',$user->nik)->get();
            return view('user.surat', compact('surat'));
        }
        return redirect()->route('login');
    }

    public function suratadmin()
    {
        $surat = Surat::join('users', 'surats.nik', '=', 'users.nik')->select('surats.*', 'users.name')->get();
        return view('admin.surat', compact('surat'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('user.surat-tambah', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => ['required'],
            'alamat' => ['required'],
            'jenis_kelamin' => ['required'],
            'jenis_surat' => ['required'],
            'tgl_pengajuan' => ['required'],
            'tgl_lahir' => ['required'],
                ]);
            $surat = new Surat();
            $surat->status = 1;
            $surat->nomor_surat = '';
            $surat->nik = $request->nik;
            $surat->jenis_kelamin = $request->jenis_kelamin;
            $surat->jenis_surat = $request->jenis_surat;
            $surat->alamat = $request->input('alamat');
            $surat->tgl_lahir = $request->tgl_lahir;
            $surat->tgl_surat = $request->tgl_pengajuan;
            $surat->scan1 = '';
            $surat->scan2 = '';
            if ($request->hasFile('lampiran')) {
                $gambar = $request->file('lampiran');
                $gambarName = time() . '_' . $gambar->getClientOriginalName();
                $gambar->move(public_path('lampiran_surat'), $gambarName);
        
                // Simpan path file gambar ke dalam database
                $surat->scan1 = 'lampiran_surat/' . $gambarName;
            }
    
            $surat->save();
    
            return redirect()->route('surat')->with('success', 'Data staf berhasil ditambahkan.');
    }

    public function listdownload()
    {
        $user = Auth::user();
        $surat = DB::table('surats')->where('nik', $user->nik)->get();
        return view('user.surat-download', compact('surat'));
    }
    public function gantistatus ($id, Request $request)
    {
        $surat = Surat::find($id);
        $surat->status = 2;
        $surat->nomor_surat = $request->nomor_surat;
        $surat->save();
        return redirect()->route('admin.surat');
    }

    public function cetaksurat($id)
    {
        $data= Surat::join('users', 'surats.nik', '=', 'users.nik')->select('surats.*', 'users.name')->where('surats.id',$id)->get();
        $kades = Staff::where('jabatan', 'Kepala Desa')->first();
        $pdf = PDF::loadView('cetak.skd', compact('data', 'kades'));
        // return $data;
        return $pdf->stream('Surat Keterangan Domisili - '.$data[0]->name.'.pdf');
    }
}
