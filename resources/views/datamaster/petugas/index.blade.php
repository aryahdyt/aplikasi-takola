@extends('partial.master')

@section('title')
Data Master Petugas
@endsection

@section('page')
<div class="breadcrumb-item active">Petugas</div>
@endsection

@section('btn-tambah')
<a href="{{ route('tambah-petugas') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
@endsection

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ __('Success ') }}</strong>{{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if(session('eror'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ __('Success ') }}</strong>{{ session('eror') }}
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
                    <div class="h6 mb-4">
                        Daftar Guru Untuk Mengantar, Memonitoring, Menjemput Peserta Prakerin
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Guru</th>
                                    <th>Jabatan</th>
                                    <th>Siap Bertugas</th>
                                    <th>Hari Bertugas</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            @forelse($petugass as $key => $petugas)
                            <tbody>
                                <tr>
                                    <td style="width: 2%">{{ ++$key }}</td>
                                    <td style="width: 15%">{{ $petugas->nama_guru }}</td>
                                    <td style="width: 15%">{{ $petugas->jabatan }}</td>
                                    <td style="width: 5%">
                                        @if ($petugas->siap_bertugas == 'sanggup')
                                        <span class="badge badge-pill badge-success">
                                            Sanggup
                                        </span>
                                        @else
                                        <span class="badge badge-pill badge-danger px-4">
                                            Tidak
                                        </span>
                                        @endif
                                    </td>
                                    <td style="width: 20%">
                                        @if ($petugas->hari == null)
                                        {{ __('-') }}
                                        @else
                                        {{ $petugas->hari }}
                                        @endif
                                    </td>
                                    <td style="width: 10%">{{ $petugas->keterangan }}</td>
                                    <td style="width: 10%" class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="/petugas/{{$petugas->id}}/edit" class="btn btn-info btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <form action="/petugas/{{$petugas->id}}" method="post">
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