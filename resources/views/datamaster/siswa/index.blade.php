@extends('partial.master')

@section('title')
Data Master Siswa
@endsection

@section('page')
<div class="breadcrumb-item active">Siswa</div>
@endsection

@section('btn-tambah')
<a href="{{ route('tambah-siswa') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                                    <th>Nama Siswa</th>
                                    <th>Nis</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            @forelse($siswas as $key => $siswa)
                            <tbody>
                                <tr>
                                    <td style="width: 10%">{{ ++$key }}</td>
                                    <td>{{ $siswa->nama_siswa }}</td>
                                    <td>{{ $siswa->nis }}</td>
                                    <td>{{ $siswa->kelas->nama_kelas }}</td>
                                    <td style="width: 20%" class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="/siswa/{{$siswa->id}}/edit" class="btn btn-info btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="/siswa/{{$siswa->id}}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form action="/siswa/{{$siswa->id}}" method="post">
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
                        {{-- {{ $kepseks->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection