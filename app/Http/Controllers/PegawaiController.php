<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use PDF;


class PegawaiController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        return view('datamaster.siswa.index', ['siswas' => $siswas]);
    }

    public function cetak_pdf()
    {
        $pegawai = Siswa::all();

        $pdf = PDF::loadview('coba_pdf', ['pegawai' => $pegawai]);
        return $pdf->stream();
    }
}
