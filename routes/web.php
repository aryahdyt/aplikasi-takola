<?php

use App\Http\Controllers\DasboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\PegawaiController;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pegawai', [PegawaiController::class, 'index']);
Route::get('/pegawai/cetak_pdf', [PegawaiController::class, 'cetak_pdf']);

Auth::routes();
Route::get('/erorRole', function () {
    return view('eror.500');
});
// Route::get('/', function () {
//     return view('partial.master');
// });

Route::group(['middleware' => ['auth', 'CekRole:admin,tu,hubin,siswa,kaprog,waka']], function () {
    // dashboard
    Route::get('/', [DasboardController::class, 'index'])->name('dashboard');
});

Route::group(['middleware' => ['auth', 'CekRole:admin']], function () {
    // pengguna
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
    Route::get('/pengguna/tambah', [PenggunaController::class, 'create'])->name('tambah-pengguna');
    Route::post('/pengguna/tambah', [PenggunaController::class, 'store'])->name('simpan-pengguna');
    Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('edit-pengguna');
    Route::put('/pengguna/{id}', [PenggunaController::class, 'update'])->name('');
    Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('');
    // Data Siswa
    Route::get('/siswa', [SiswaController::class, 'index'])->name('data-siswa');
    Route::get('/siswa/tambah', [SiswaController::class, 'create'])->name('tambah-siswa');
    Route::post('/siswa/tambah', [SiswaController::class, 'store'])->name('simpan-siswa');
    Route::get('/siswa/{id}', [SiswaController::class, 'show'])->name('detail-siswa');
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('edit-siswa');
    Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('');
    Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('');
    // Data Kelas
    Route::get('/kelas', [KelasController::class, 'index'])->name('data-kelas');
    Route::get('/kelas/tambah', [KelasController::class, 'create'])->name('tambah-kelas');
    Route::post('/kelas/tambah', [KelasController::class, 'store'])->name('simpan-kelas');
    Route::get('/kelas/{id}', [KelasController::class, 'show'])->name('detail-kelas');
    Route::get('/kelas/{id}/edit', [KelasController::class, 'edit'])->name('edit-kelas');
    Route::put('/kelas/{id}', [KelasController::class, 'update'])->name('');
    Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])->name('');
    // Data Petugas
    Route::get('/petugas', [PetugasController::class, 'index'])->name('data-petugas');
    Route::get('/petugas/tambah', [PetugasController::class, 'create'])->name('tambah-petugas');
    Route::post('/petugas/tambah', [PetugasController::class, 'store'])->name('simpan-petugas');
    Route::get('/petugas/{id}/edit', [PetugasController::class, 'edit'])->name('edit-petugas');
    Route::put('/petugas/{id}', [PetugasController::class, 'update'])->name('');
    Route::delete('/petugas/{id}', [PetugasController::class, 'destroy'])->name('');
});

Route::group(['middleware' => ['auth', 'CekRole:admin,tu']], function () {
    // Data Surat
    Route::get('/surat', [SuratController::class, 'index'])->name('data-surat');
    Route::get('/surat/petugas', [SuratController::class, 'tampilPetugas'])->name('cari-petugas-surat');
    Route::get('/surat/petugas/{id}', [SuratController::class, 'create'])->name('tambah-surat');
    Route::post('/surat/tambah', [SuratController::class, 'store'])->name('simpan-surat');
    Route::get('/surat/{id}/edit', [SuratController::class, 'edit'])->name('edit-surat');
    Route::put('/surat/{id}', [SuratController::class, 'update'])->name('');
    Route::delete('/surat/{id}', [SuratController::class, 'destroy'])->name('');

    Route::get('/surat/pdf/{id}', [SuratController::class, 'showPdf'])->name('pdf-surat');
});
