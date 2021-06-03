<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $countSiswa = Siswa::get()->count();
        // dd($siswas);
        return view('dashboard', compact('countSiswa'));
    }
}
