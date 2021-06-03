@extends('partial.master')

@section('title')
Detail Siswa
@endsection

@section('page')
<div class="breadcrumb-item"><a href="{{ route('data-siswa') }}">Siswa</a></div>
<div class="breadcrumb-item active">{{ $siswa->nama_siswa }}</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4 col-12">
        <div class="card card-statistic-1 pb-4">
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Nama Siswa</h4>
                </div>
                <div class="card-body">
                    {{ $siswa->nama_siswa }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-12">
        <div class="card card-statistic-1 pb-4">
            <div class="card-wrap">
                <div class="card-header">
                    <h4>NIS Siswa</h4>
                </div>
                <div class="card-body">
                    {{ $siswa->nis }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-12">
        <div class="card card-statistic-1 pb-4">
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Kelas Siswa</h4>
                </div>
                <div class="card-body">
                    {{ $siswa->kelas->nama_kelas }}
                </div>
            </div>
        </div>
    </div>
</div>
<a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-outline-primary"><i
        class="fas fa-arrow-left mx-2"></i>Kembali</a>
@endsection