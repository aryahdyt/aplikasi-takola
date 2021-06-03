@extends('partial.master')

@section('page')
<div class="breadcrumb-item"><a href="{{ route('data-kelas') }}">Kelas</a></div>
<div class="breadcrumb-item active">Tambah</div>
@endsection

@section('title')
Tambah Data Kelas
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card p-5">
            <form method="POST" action="{{ route('simpan-kelas') }}">
                @csrf
                <div class="form-group row mb-2 mx-5">
                    <label for="tingkat" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Tingkat Kelas
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <select class="form-control" name="tingkat" required>
                            <option value="">- Pilih -</option>
                            <option value="X">X (Sepuluh)</option>
                            <option value="XI">XI (Sebelas)</option>
                            <option value="XII">XII (Dua Belas)</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-2 mx-5">
                    <label for="jurusan" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Jurusan Kelas
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <select class="form-control" name="jurusan" required>
                            <option value="">- Pilih -</option>
                            <option value="RPL">RPL</option>
                            <option value="TKJ">TKJ</option>
                            <option value="MM">MM</option>
                            <option value="TEI">TEI</option>
                            <option value="BRC">BRC</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-2 mx-5">
                    <label for="nama" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Nama Kelas
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', '') }}"
                            placeholder="Masukan Nama Kelas" required>
                    </div>
                </div>

                <div class="form-group row mb-2 mx-5">
                    <label for="keterangan" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Keterangan Kelas
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <textarea name="keterangan" class="form-control" cols="30" rows="10" required></textarea>
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