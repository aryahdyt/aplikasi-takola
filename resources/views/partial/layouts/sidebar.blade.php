<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="">{{ config('app.name') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="">
                <img src="{{ asset('assets/img/logo/logo_tb.png') }}" alt="SMK TARUNA BHAKTI" width="50px">
            </a>
        </div>
        <ul class="sidebar-menu">
            @if (auth()->user()->role == "admin")
            {{-- sidebarAdmin --}}
            <li class="menu-header">Dashboard</li>
            <li class="{{ request()->is('/') ? 'active' : '' }}"><a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fire"></i></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Modul Umum</li>
            <li class="{{ request()->is('pengguna*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('pengguna') }}">
                    <i class="fas fa-user"></i></i>
                    <span>Pengguna</span></a>
            </li>
            <li class="nav-item dropdown {{ request()->is('siswa*', 'kelas*', 'petugas*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Data Master</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('siswa*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('data-siswa') }}">Data Siswa</a>
                    </li>
                    <li class="{{ request()->is('kelas*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('data-kelas') }}">Data Kelas</a>
                    </li>
                    <li class="{{ request()->is('petugas*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('data-petugas') }}">Data Petugas</a>
                    </li>
                </ul>
            </li>
            <li class="menu-header">Modul Prakerin</li>
            <li class="{{ request()->is('surat*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('data-surat') }}">
                    <i class="fas fa-envelope"></i><span>Data Surat</span></i>
                </a>
            </li>
            @elseif(auth()->user()->role == "siswa")
            {{-- sidebarSiswa --}}

            @elseif(auth()->user()->role == "tu")
            {{-- sidebarTu --}}
            <li class="menu-header">Dashboard</li>
            <li class="{{ request()->is('/') ? 'active' : '' }}"><a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fire"></i></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Modul Prakerin</li>
            <li class="{{ request()->is('surat*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('data-surat') }}">
                    <i class="fas fa-envelope"></i><span>Data Surat</span></i>
                </a>
            </li>
            @endif
        </ul>
    </aside>
</div>