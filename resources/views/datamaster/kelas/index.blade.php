@extends('partial.master')

@section('title')
Data Master Kelas
@endsection

@section('page')
<div class="breadcrumb-item active">Kelas</div>
@endsection

@section('btn-tambah')
<a href="{{ route('tambah-kelas') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kelas</th>
                                    <th>Tingkat</th>
                                    <th>Jurusan</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            @forelse($kelass as $key => $kelas)
                            <tbody>
                                <tr>
                                    <td style="width: 10%">{{ ++$key }}</td>
                                    <td>{{ $kelas->nama_kelas }}</td>
                                    <td>{{ $kelas->tingkat }}</td>
                                    <td>{{ $kelas->jurusan }}</td>
                                    <td>{{ $kelas->keterangan }}</td>
                                    <td style="width: 20%" class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="/kelas/{{$kelas->id}}/edit" class="btn btn-info btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="/kelas/{{$kelas->id}}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form action="/kelas/{{$kelas->id}}" method="post">
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