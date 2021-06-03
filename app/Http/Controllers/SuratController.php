<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Surat;
use Illuminate\Http\Request;
use PDF;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surats = Surat::paginate(10);
        // $surats->tanggal_pelaks->isoFormat('dddd, D MMMM Y');
        return view('prakerin.datasurat.index', compact('surats'));
    }

    public function tampilPetugas()
    {
        $petugass = Petugas::where('siap_bertugas', 'sanggup')->paginate(10);

        return view('prakerin.datasurat.petugas', compact('petugass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $petugas = Petugas::where('id', $id)->get()->first();
        return view('prakerin.datasurat.tambah', compact('petugas'));
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
            'petugas' => ['required', 'string'],
            'template_surat' => ['required'],
            'tanggal_pelaksanaan' => ['required'],
            'content_surat' => ['required'],
            'nama_perusahaan' => ['required'],
            'alamat_perusahaan' => ['required'],
        ]);

        $pengguna = Surat::create([
            'petugas_id' => $request['petugas'],
            'nama_template_surat' => $request['template_surat'],
            'tanggal_pelaksanaan' => $request['tanggal_pelaksanaan'],
            'content_surat' => $request['content_surat'],
            'nama_perusahaan' => $request['nama_perusahaan'],
            'alamat_perusahaan' => $request['alamat_perusahaan'],
        ]);

        return redirect()->route('data-surat')->with('success', 'Data berhasil Di Tambah');
    }

    public function showPdf($id)
    {
        $surat = Surat::where('id', $id)->get()->first();

        $pdf = PDF::loadview('template_surat.surat_tugas', compact('surat'));
        return $pdf->stream();
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
        $surat = Surat::where('id', $id)->get()->first();
        $petugass = Petugas::where('siap_bertugas', 'sanggup')->get();

        return view('prakerin.datasurat.edit', compact('surat', 'petugass'));
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
        $surat = Surat::where('id', $id)->update([
            'petugas_id' => $request['petugas'],
            'nama_template_surat' => $request['template_surat'],
            'tanggal_pelaksanaan' => $request['tanggal_pelaksanaan'],
            'content_surat' => $request['content_surat'],
            'nama_perusahaan' => $request['nama_perusahaan'],
            'alamat_perusahaan' => $request['alamat_perusahaan'],
        ]);

        return redirect()->route('data-surat')->with('success', 'Data berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Surat::destroy($id);
        return redirect()->route('data-surat')->with('eror', 'Data berhasil Di Hapus');
    }
}
