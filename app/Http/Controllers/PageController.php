<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProfileDesa;
use App\Models\Staff;
use App\Models\Informasi;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function beranda()
    {
        $user = Auth::user();
        $profile = ProfileDesa::first();
        if(isset($user->role) && $user->role == 'admin'){
            return redirect()->route('admin');
        }
        return view('welcome', compact('profile'));
    }
    public function profile()
    {
        $profile = ProfileDesa::first();
        $kades = Staff::where('jabatan', 'Kepala Desa')->first();
        return view('profile-desa', compact('profile', 'kades'));
    }

    public function visimisi()
    {
        $profile = ProfileDesa::first();
        return view('visi-misi-desa', compact('profile'));
    }

    public function staff()
    {
        $staff = Staff::all();
        return view('perangkat-desa', compact('staff'));
    }
    public function informasi()
    {
        $informasi = Informasi::all();
        return view('informasi', compact('informasi'));
    }
    public function informasidetail($id)
    {
        $informasi = Informasi::find($id);
        $news = DB::table('beritas')->orderBy('tgl_berita', 'desc')->limit(5)->get();
        return view('informasi-detail', compact('informasi', 'news'));
    }
}
