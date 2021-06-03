@extends('partial.master')

@section('title')
Update Data Pengguna
@endsection

@section('page')
<div class="breadcrumb-item"><a href="{{ route('pengguna') }}">Pengguna</a></div>
<div class="breadcrumb-item active">Tambah</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card p-5">
            <form action="/pengguna/{{ $users->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group row mb-2 mx-5">
                    <label for="name" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Username
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ old('name', $users->name) }}" placeholder="Masukan Username Pengguna" required>
                    </div>
                </div>
                <div class="form-group row mb-2 mx-5">
                    <label for="email" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Email
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <input type="email" class="form-control" name="email" id="email"
                            value="{{ old('email', $users->email) }}" placeholder="Masukan Email Pengguna" required>
                    </div>
                </div>
                <div class="form-group row mb-2 mx-5">
                    <label for="password" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Password
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <input type="password" class="form-control" name="password" id="password" value=""
                            placeholder="">
                        <p class="text-danger text-xs mb-1">Kosongkan saja jika tidak akan mengubah password</p>
                    </div>
                </div>
                <div class="form-group row mb-2 mx-5">
                    <label for="role" class="col-form-label text-md-right col-12 col-md-3 col-lg-3 text-dark">
                        Role Pengguna
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <select class="form-control" name="role" required>
                            <option value="{{ $users->role }}">
                                @if ($users->role == 'tu')
                                {{ __('Tata Usaha') }}
                                @elseif($users->role == 'hubin')
                                {{ __('Hubungan Industri') }}
                                @elseif($users->role == 'siswa')
                                {{ __('Siswa') }}
                                @elseif($users->role == 'kaprog')
                                {{ __('Kepala Program') }}
                                @elseif($users->role == 'waka')
                                {{ __('Kepala/Wakil Sekolah') }}
                                @elseif($users->role == 'admin')
                                {{ __('Admin') }}
                                @endif
                            </option>
                            <option value="admin">Admin</option>
                            <option value="tu">Tata Usaha</option>
                            <option value="hubin">Hubungan Industri</option>
                            <option value="siswa">Siswa</option>
                            <option value="kaprog">Kepala Program</option>
                            <option value="waka">Kepala/Wakil Sekolah</option>
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