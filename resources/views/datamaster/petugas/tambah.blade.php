@extends('partial.master')

@section('page')
<div class="breadcrumb-item"><a href="{{ route('data-petugas') }}">Petugas</a></div>
<div class="breadcrumb-item active">Tambah</div>
@endsection

@section('title')
Tambah Data Petugas
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card p-5">
            <form method="POST" action="{{ route('simpan-petugas') }}">
                @csrf
                <div class="form-group row mb-2 mx-5">
                    <label for="nama" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Nama Petugas
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', '') }}"
                            placeholder="Masukan Nama Petugas" required>
                    </div>
                </div>

                <div class="form-group row mb-2 mx-5">
                    <label for="jabatan" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Jabatan Petugas
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="jabatan" id="jabatan"
                            value="{{ old('jabatan', '') }}" placeholder="Masukan Jabatan Petugas" required>
                    </div>
                </div>

                <div class="form-group row mb-2 mx-5">
                    <label for="siap_bertugas" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Siap Bertugas
                    </label>
                    <div class="col-lg-4 col-md-6">
                        <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                                <input type="radio" onclick="bertugas()" id="siap_bertugas" name="siap_bertugas"
                                    value="sanggup" class="selectgroup-input">
                                <span class="selectgroup-button">Sanggup</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" onclick="bertugas()" id="siap_bertugas" name="siap_bertugas"
                                    value="tidak" class="selectgroup-input">
                                <span class="selectgroup-button">Tidak</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-2 mx-5">
                    <label for="hari" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Hari
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input type="checkbox" name="hari[]" value="Senin" class="selectgroup-input">
                                <span class="selectgroup-button">Senin</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="hari[]" value="Selasa" class="selectgroup-input">
                                <span class="selectgroup-button">Selasa</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="hari[]" value="Rabu" class="selectgroup-input">
                                <span class="selectgroup-button">Rabu</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="hari[]" value="Kamis" class="selectgroup-input">
                                <span class="selectgroup-button">Kamis</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="hari[]" value="Jumat" class="selectgroup-input">
                                <span class="selectgroup-button">Jumat</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="checkbox" name="hari[]" value="Sabtu" class="selectgroup-input">
                                <span class="selectgroup-button">Sabtu</span>
                            </label>
                        </div>
                        <p class="text-danger text-xs mb-1">Kosongkan saja jika tidak Tidak Bisa Bertugas</p>
                    </div>
                </div>

                <div class="form-group row mb-2 mx-5">
                    <label for="keterangan" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Keterangan
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <textarea name="keterangan" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>

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