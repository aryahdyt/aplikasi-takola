@extends('partial.master')

@section('title')
Data Surat
@endsection

@section('page')
<div class="breadcrumb-item active">Surat</div>
@endsection

@section('btn-tambah')
<a href="{{ route('cari-petugas-surat') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
@endsection

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ __('Success') }}</strong>{{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if(session('eror'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ __('Success') }}</strong>{{ session('eror') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="section body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Guru Monitoring</th>
                                    {{-- <th>Nama Template Surat</th>
                                    <th>Nomor Surat</th> --}}
                                    <th>Nama Perusahaan</th>
                                    <th>Alamat Perusahaan</th>
                                    <th>Tanggal Pelaksanaan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            @forelse($surats as $key => $surat)
                            <tbody>
                                <tr>
                                    <td style="width: 5%">{{ ++$key }}</td>
                                    <td>{{ $surat->petugas->nama_guru }}</td>
                                    {{-- <td>{{ $surat->nama_template_surat }}</td>
                                    <td>{{ $surat->nomor_surat }}</td> --}}
                                    <td>{{ $surat->nama_perusahaan }}</td>
                                    <td>{{ $surat->alamat_perusahaan }}</td>
                                    <td>{{ $surat->get_tanggal_pelaksanaan() }}</td>
                                    <td style="width: 20%" class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="/surat/{{$surat->id}}/edit" class="btn btn-info btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="/surat/pdf/{{$surat->id}}" target="_blank"
                                                class="btn btn-warning btn-sm">
                                                PDF
                                            </a>
                                            <form action="/surat/{{$surat->id}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin hapus data ? ');">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            @empty
                            <tr>
                                <td colspan="4" align="center">Tidak Ada Data</td>
                            </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection