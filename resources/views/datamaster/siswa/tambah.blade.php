@extends('partial.master')

@section('page')
<div class="breadcrumb-item"><a href="{{ route('data-siswa') }}">Siswa</a></div>
<div class="breadcrumb-item active">Tambah</div>
@endsection

@section('title')
Tambah Data Siswa
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card p-5">
            <form method="POST" action="{{ route('simpan-siswa') }}">
                @csrf
                <div class="form-group row mb-2 mx-5">
                    <label for="nama" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Nama Siswa
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', '') }}"
                            placeholder="Masukan Nama Siswa" required>
                    </div>
                </div>

                <div class="form-group row mb-2 mx-5">
                    <label for="nis" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Nis Siswa
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <input type="number" class="form-control" name="nis" id="nis" value="{{ old('nis', '') }}"
                            placeholder="Masukan Nis Siswa" required>
                    </div>
                </div>

                <div class="form-group row mb-2 mx-5">
                    <label for="kelas" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Kelas Siswa
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <select class="form-control" name="kelas" required>
                            <option value="">- Pilih -</option>
                            @foreach ($kelass as $kelas)
                            <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                            @endforeach
                        </select>
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
{{-- <div class="form-group row mb-2 mx-5">
    <label for="akun" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
        Akun Siswa
    </label>
    <div class="col-sm-12 col-md-7">
        <select class="form-control" name="akun" required>
            <option value="">- Pilih -</option>
            @foreach ($akuns as $akun)
            <option value="{{ $akun->id }}">
email : {{ $akun->email }} ( {{ $akun->name }} )
</option>
@endforeach
</select>
</div>
</div> --}}