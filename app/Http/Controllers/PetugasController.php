<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugass = Petugas::orderBy('hari', 'desc')->paginate(10);

        return view('datamaster.petugas.index', compact('petugass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datamaster.petugas.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'jabatan' => ['required', 'string', 'max:255'],
            'siap_bertugas' => ['required', 'string', 'max:255'],
            'keterangan' => ['required', 'string', 'max:255'],
        ]);

        if (!empty($request->hari)) {
            $harijoin = join(', ', $request['hari']);

            $pengguna = Petugas::create([
                'nama_guru' => $request['nama'],
                'jabatan' => $request['jabatan'],
                'siap_bertugas' => $request['siap_bertugas'],
                'hari' => $harijoin,
                'keterangan' => $request['keterangan'],
            ]);
        } else {
            $harijoin = null;

            $pengguna = Petugas::create([
                'nama_guru' => $request['nama'],
                'jabatan' => $request['jabatan'],
                'siap_bertugas' => $request['siap_bertugas'],
                'hari' => null,
                'keterangan' => $request['keterangan'],
            ]);
        }

        return redirect()->route('data-petugas')->with('success', 'Data berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $petugas = Petugas::where('id', $id)->get()->first();
        return view('datamaster.petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->siap_bertugas == "tidak") {
            $petugas = Petugas::where('id', $id)->update([
                'nama_guru' => $request['nama'],
                'jabatan' => $request['jabatan'],
                'siap_bertugas' => $request['siap_bertugas'],
                'hari' => null,
                'keterangan' => $request['keterangan'],
            ]);
        } else {
            if (!empty($request->hari)) {
                $harijoin = join(', ', $request['hari']);

                $petugas = Petugas::where('id', $id)->update([
                    'nama_guru' => $request['nama'],
                    'jabatan' => $request['jabatan'],
                    'siap_bertugas' => $request['siap_bertugas'],
                    'hari' => $harijoin,
                    'keterangan' => $request['keterangan'],
                ]);
            } else {
                $petugas = Petugas::where('id', $id)->update([
                    'nama_guru' => $request['nama'],
                    'jabatan' => $request['jabatan'],
                    'siap_bertugas' => $request['siap_bertugas'],
                    'hari' => $request['hariOld'],
                    'keterangan' => $request['keterangan'],
                ]);
            }
        }

        return redirect()->route('data-petugas')->with('success', 'Data berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Petugas::destroy($id);
        return redirect()->route('data-petugas')->with('eror', 'Data berhasil Di Hapus');
    }
}
