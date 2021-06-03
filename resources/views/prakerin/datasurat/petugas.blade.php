@extends('partial.master')

@section('title')
Data Petugas Siap Bertugas
@endsection

@section('page')
<div class="breadcrumb-item"><a href="{{ route('data-surat') }}">Surat</a></div>
<div class="breadcrumb-item active">Petugas</div>
@endsection

@section('content')
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
                                    <td style="width: 20%">
                                        @if ($petugas->hari == null)
                                        {{ __('-') }}
                                        @else
                                        {{ $petugas->hari }}
                                        @endif
                                    </td>
                                    <td style="width: 10%">{{ $petugas->keterangan }}</td>
                                    <td style="width: 10%" class="text-center">
                                        <a href="/surat/petugas/{{$petugas->id}}"
                                            class="btn btn-success btn-block text-uppercase">
                                            pilih</i>
                                        </a>
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