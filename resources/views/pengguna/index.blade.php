@extends('partial.master')

@section('title')
Data Master Pengguna
@endsection

@section('page')
<div class="breadcrumb-item active">Pengguna</div>
@endsection

@section('btn-tambah')
<a href="{{ route('tambah-pengguna') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#siswa" role="tab"
                                aria-controls="home" aria-selected="true">Siswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#tu" role="tab"
                                aria-controls="profile" aria-selected="false">Tata Usaha</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#hubin" role="tab"
                                aria-controls="contact" aria-selected="false">Hubin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#kaprog" role="tab"
                                aria-controls="contact" aria-selected="false">Kepala Program</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#kepsek" role="tab"
                                aria-controls="contact" aria-selected="false">Kepala/Wakil Sekolah</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="siswa" role="tabpanel" aria-labelledby="home-tab3">
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    @forelse($siswas as $key => $siswa)
                                    <tbody>
                                        <tr>
                                            <td style="width: 10%">{{ ++$key }}</td>
                                            <td>{{ $siswa->name }}</td>
                                            <td>{{ $siswa->email }}</td>
                                            <td style="width: 20%" class="text-center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="/pengguna/{{$siswa->id}}/edit" class="btn btn-info btn-sm">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <form action="/pengguna/{{$siswa->id}}" method="post">
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
                                {{-- {{ $siswas->links() }} --}}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tu" role="tabpanel" aria-labelledby="profile-tab3">
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    @forelse($tata_usahas as $key => $tata_usaha)
                                    <tbody>
                                        <tr>
                                            <td style="width: 10%">{{ ++$key }}</td>
                                            <td>{{ $tata_usaha->name }}</td>
                                            <td>{{ $tata_usaha->email }}</td>
                                            <td style="width: 20%" class="text-center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="/pengguna/{{$tata_usaha->id}}/edit"
                                                        class="btn btn-info btn-sm">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <form action="/pengguna/{{$tata_usaha->id}}" method="post">
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
                                {{-- {{ $tata_usahas->links() }} --}}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="hubin" role="tabpanel" aria-labelledby="contact-tab3">
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    @forelse($hubins as $key => $hubin)
                                    <tbody>
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $hubin->name }}</td>
                                            <td>{{ $hubin->email }}</td>
                                            <td style="width: 20%" class="text-center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="/pengguna/{{$hubin->id}}/edit" class="btn btn-info btn-sm">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <form action="/pengguna/{{$hubin->id}}" method="post">
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
                                {{-- {{ $hubins->links() }} --}}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="kaprog" role="tabpanel" aria-labelledby="contact-tab3">
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    @forelse($kaprogs as $key => $kaprog)
                                    <tbody>
                                        <tr>
                                            <td style="width: 10%">{{ ++$key }}</td>
                                            <td>{{ $kaprog->name }}</td>
                                            <td>{{ $kaprog->email }}</td>
                                            <td style="width: 20%" class="text-center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="/pengguna/{{$kaprog->id}}/edit"
                                                        class="btn btn-info btn-sm">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <form action="/pengguna/{{$kaprog->id}}" method="post">
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
                                {{-- {{ $kaprogs->links() }} --}}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="kepsek" role="tabpanel" aria-labelledby="contact-tab3">
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    @forelse($kepseks as $key => $kepsek)
                                    <tbody>
                                        <tr>
                                            <td style="width: 10%">{{ ++$key }}</td>
                                            <td>{{ $kepsek->name }}</td>
                                            <td>{{ $kepsek->email }}</td>
                                            <td style="width: 20%" class="text-center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="/pengguna/{{$kepsek->id}}/edit"
                                                        class="btn btn-info btn-sm">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <form action="/pengguna/{{$kepsek->id}}" method="post">
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
    </div>
</div>
@endsection