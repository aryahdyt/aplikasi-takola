<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $siswas = User::where('role', 'siswa')->orderBy('created_at', 'desc')->paginate(10);
        $tata_usahas = User::where('role', 'tu')->orderBy('created_at', 'desc')->paginate(10);
        $hubins = User::where('role', 'hubin')->orderBy('created_at', 'desc')->paginate(10);
        $kaprogs = User::where('role', 'kaprog')->orderBy('created_at', 'desc')->paginate(10);
        $kepseks = User::where('role', 'waka')->orderBy('created_at', 'desc')->paginate(10);
        // dd($siswas);
        return view('pengguna.index', compact('siswas', 'tata_usahas', 'hubins', 'kaprogs', 'kepseks'));
    }

    public function create()
    {
        return view('pengguna.tambah');
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users', 'max:255'],
            'role' => ['required', 'string'],
        ]);

        $pengguna = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
        ]);

        return redirect()->route('pengguna')->with('success', 'Data berhasil Di Tambah');
    }

    public function edit($id)
    {
        $users = User::where('id', $id)->first();

        return view('pengguna.edit', compact('users'));
    }

    public function update($id, Request $request)
    {
        if ($request['password'] != null) {
            $update = User::where('id', $id)->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'role' => $request['role'],
            ]);
        } else {
            $update = User::where('id', $id)->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'role' => $request['role'],
            ]);
        }

        return redirect()->route('pengguna')->with('success', 'Data berhasil Di Update');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('pengguna')->with('eror', 'Data berhasil Di Hapus');
    }
}
