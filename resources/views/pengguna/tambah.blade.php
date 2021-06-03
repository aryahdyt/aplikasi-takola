@extends('partial.master')

@section('page')
<div class="breadcrumb-item"><a href="{{ route('pengguna') }}">Pengguna</a></div>
<div class="breadcrumb-item active">Tambah</div>
@endsection

@section('title')
Tambah Data Pengguna
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card p-5">
            <form method="POST" action="{{ route('simpan-pengguna') }}">
                @csrf
                <div class="form-group row mb-2 mx-5">
                    <label for="name" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Username
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', '') }}"
                            placeholder="Masukan Username Pengguna" required>
                    </div>
                </div>
                <div class="form-group row mb-2 mx-5">
                    <label for="email" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Email
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email', '') }}"
                            placeholder="Masukan Email Pengguna" required>
                    </div>
                </div>
                <div class="form-group row mb-2 mx-5">
                    <label for="password" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Password
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <input type="password" class="form-control" name="password" id="password" value=""
                            placeholder="Masukan Password Pengguna" required>
                    </div>
                </div>
                <div class="form-group row mb-2 mx-5">
                    <label for="role" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Role Pengguna
                    </label>
                    <div class="col-lg-4 col-md-6">
                        <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                                <input type="radio" name="role" value="admin" class="selectgroup-input">
                                <span class="selectgroup-button">Admin</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="role" value="siswa" class="selectgroup-input">
                                <span class="selectgroup-button">Siswa</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="role" value="tu" class="selectgroup-input">
                                <div class="selectgroup-button">TataUsaha</div>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="role" value="hubin" class="selectgroup-input">
                                <span class="selectgroup-button">Hubin</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="role" value="kaprog" class="selectgroup-input">
                                <span class="selectgroup-button">KepalaProgram</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="role" value="waka" class="selectgroup-input">
                                <span class="selectgroup-button">KepalaSekolah</span>
                            </label>
                        </div>
                    </div>
                </div>
                {{-- <div class="form-group row mb-2 mx-5">
                    <label for="role" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Role Pengguna
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <select class="form-control" name="role" required>
                            <option value="">- Pilih -</option>
                            <option value="admin">admin</option>
                            <option value="tu">Tata Usaha</option>
                            <option value="hubin">Hubungan Industri</option>
                            <option value="siswa">Siswa</option>
                            <option value="kaprog">Kepala Program</option>
                            <option value="waka">Kepala/Wakil Sekolah</option>
                        </select>
                    </div>
                </div> --}}

                <div class="row mt-3">
                    <!-- /.col -->
                    <div class="col-4 m-auto">
                        <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-outline-primary"><i
                                class="fas fa-arrow-left"></i></a>
                        <button type="reset" class="btn btn-danger">
                            <i class="fas fa-redo"></i>
                        </button>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Tambah') }}
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
    </div>
</div>
@endsection