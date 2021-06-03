@extends('partial.master')

@section('title')
dasboard
@endsection

@section('content')
@if (auth()->user()->role == "admin")
{{-- admin --}}
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Siswa</h4>
                </div>
                <div class="card-body">
                    {{ $countSiswa }}
                </div>
            </div>
        </div>
    </div>
</div>
@elseif(auth()->user()->role == "siswa")
{{-- siswa --}}
@elseif(auth()->user()->role == "tu")
{{-- tu --}}
@elseif(auth()->user()->role == "hubin")
{{-- hubin --}}
@elseif(auth()->user()->role == "kaprog")
{{-- kaprog --}}
@elseif(auth()->user()->role == "waka")
{{-- waka --}}
@endif
@endsection