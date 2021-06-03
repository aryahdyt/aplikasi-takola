@extends('partial.master')

@section('title')
Detail Siswa
@endsection

@section('page')
<div class="breadcrumb-item"><a href="{{ route('data-siswa') }}">Siswa</a></div>
<div class="breadcrumb-item active">{{ $kelas->nama_kelas }}</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-3 col-12">
        <div class="card card-statistic-1 pb-4">
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Nama Kelas</h4>
                </div>
                <div class="card-body">
                    {{ $kelas->nama_kelas }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-12">
        <div class="card card-statistic-1 pb-4">
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Tingkat Kelas</h4>
                </div>
                <div class="card-body">
                    {{ $kelas->tingkat }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-12">
        <div class="card card-statistic-1 pb-4">
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Jurusan Kelas</h4>
                </div>
                <div class="card-body">
                    {{ $kelas->jurusan }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-12">
        <div class="card card-statistic-1 pb-4">
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Keterangan Kelas</h4>
                </div>
                <div class="card-body">
                    {{ $kelas->keterangan }}
                </div>
            </div>
        </div>
    </div>
</div>
<a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-outline-primary"><i
        class="fas fa-arrow-left mx-2"></i>Kembali</a>
@endsection