<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MasyarakatController extends Controller
{
    public function create()
    {
        $masyarakat = DB::table('users')->where('role','masyarakat')->get();
        return view('admin.masyarakat', compact('masyarakat'));
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
        $user = User::where('id', $id)->first();
        return view('masyarakat.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nohandphone' => ['required', 'numeric', 'digits_between:1,16'],
            'name' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
        ]);
        $user = User::find($id);
        $user->nohandphone = $request->nohandphone;
        $user->name = $request->name;
        $user->alamat = $request->alamat;
        $user->save();
        return redirect()->route('admin.masyarakat');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.masyarakat');
    }
}
