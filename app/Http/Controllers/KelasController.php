<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
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
        $kelass = Kelas::paginate(10);

        return view('datamaster.kelas.index', compact('kelass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datamaster.kelas.tambah');
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
            'tingkat' => ['required', 'string'],
            'jurusan' => ['required', 'string'],
            'nama' => ['required', 'string'],
            'keterangan' => ['required'],
        ]);

        $kelas = Kelas::create([
            'tingkat' => $request['tingkat'],
            'jurusan' => $request['jurusan'],
            'nama_kelas' => $request['nama'],
            'keterangan' => $request['keterangan'],
        ]);

        return redirect()->route('data-kelas')->with('success', 'Data berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = Kelas::where('id', $id)->get()->first();
        return view('datamaster.kelas.detail', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::where('id', $id)->get()->first();
        return view('datamaster.kelas.edit', compact('kelas'));
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
        $kelas = Kelas::where('id', $id)->update([
            'tingkat' => $request['tingkat'],
            'jurusan' => $request['jurusan'],
            'nama_kelas' => $request['nama'],
            'keterangan' => $request['keterangan'],
        ]);

        return redirect()->route('data-kelas')->with('success', 'Data berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kelas::destroy($id);
        return redirect()->route('data-kelas')->with('eror', 'Data berhasil Di Hapus');
    }
}
