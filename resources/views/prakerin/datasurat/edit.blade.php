@extends('partial.master')

@section('page')
<div class="breadcrumb-item"><a href="{{ route('data-surat') }}">Surat</a></div>
<div class="breadcrumb-item active">Update</div>
@endsection

@section('title')
Update Data Surat
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card p-5">
            <form action="/surat/{{ $surat->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group row mb-2 mx-5">
                    <label for="petugas" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Nama Petugas
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <select name="petugas" id="petugas" class="form-control text-capitalize">
                            <option value="{{ $surat->petugas_id }}">{{ $surat->petugas->nama_guru }}</option>
                            @foreach ($petugass as $petugas)
                            <option value="{{ $petugas->id }}">{{ $petugas->nama_guru }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-2 mx-5 text-capitalize">
                    <label for="template_surat" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Nama Template Surat
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="template_surat" id="template_surat"
                            value="{{ $surat->nama_template_surat }}" placeholder="Masukan Nama Template Surat"
                            required>
                    </div>
                </div>

                <div class="form-group row mb-2 mx-5 text-capitalize">
                    <label for="tanggal_pelaksanaan"
                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Tanggal Pelaksanaan
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <input type="date" class="form-control" name="tanggal_pelaksanaan" id="tanggal_pelaksanaan"
                            value="{{ $surat->tanggal_pelaksanaan }}" placeholder="Masukan Tanggal Pelaksanaan"
                            required>
                    </div>
                </div>

                <div class="form-group row mb-2 mx-5 text-capitalize">
                    <label for="content_surat" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Content Surat
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <textarea name="content_surat" id="" cols="60" rows="7"
                            required>{{ $surat->content_surat }}</textarea>
                    </div>
                </div>

                <div class="form-group row mb-2 mx-5 text-capitalize">
                    <label for="nama_perusahaan"
                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Nama Perusahaan
                    </label>
                    <div class="col-sm-12 col-md-7 input-group">
                        <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan"
                            value="{{ $surat->nama_perusahaan }}" placeholder="Masukan Nama Perusahaan" required>

                        <input type="text" class="form-control" name="alamat_perusahaan" id="alamat_perusahaan"
                            value="{{ $surat->alamat_perusahaan }}" placeholder=" Alamat Perusahaan" required>
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
                            {{ __('Update') }}
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
    </div>
</div>
@endsection