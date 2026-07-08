<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-School - SMA Nusantara Bangsa</title>

    <link rel="shortcut icon" href="{{ asset('assets/compiled/svg/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/iconly.css') }}">
</head>

<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    <div id="app">

        {{-- Sidebar --}}
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="{{ route('dashboard') }}" class="d-flex align-items-center">
                                <span class="fw-bold ms-2" style="color: #435ebe;">E-School</span>
                            </a>
                        </div>
                        <div class="sidebar-toggler x">
                            <a href="#" class="sidebar-hide d-xl-none d-block">
                                <i class="bi bi-x bi-middle"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="sidebar-menu">
                    <ul class="menu">

                        {{-- ── MENU UTAMA ── --}}
                        <li class="sidebar-title">Menu Utama</li>

                        <li class="sidebar-item {{ request()->is('dashboard') ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}" class="sidebar-link">
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        {{-- Admin & Kepala Sekolah --}}
                        @if(auth()->user()->isAdmin() || auth()->user()->isKepalaSekolah())
                        <li class="sidebar-item {{ request()->is('siswa*') ? 'active' : '' }}">
                            <a href="{{ route('siswa.index') }}" class="sidebar-link">
                                <i class="bi bi-people-fill"></i>
                                <span>Data Siswa</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->is('guru*') ? 'active' : '' }}">
                            <a href="{{ route('guru.index') }}" class="sidebar-link">
                                <i class="bi bi-person-fill"></i>
                                <span>Data Guru</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->is('kelas*') ? 'active' : '' }}">
                            <a href="{{ route('kelas.index') }}" class="sidebar-link">
                                <i class="bi bi-building"></i>
                                <span>Data Kelas</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->is('mapel*') ? 'active' : '' }}">
                            <a href="{{ route('mapel.index') }}" class="sidebar-link">
                                <i class="bi bi-book-fill"></i>
                                <span>Mata Pelajaran</span>
                            </a>
                        </li>
                        @endif

                        {{-- ── AKADEMIK ── --}}
                        <li class="sidebar-title">Akademik</li>

                        {{-- Jadwal: semua role bisa lihat --}}
                        <li class="sidebar-item {{ request()->is('jadwal*') ? 'active' : '' }}">
                            <a href="{{ route('jadwal.index') }}" class="sidebar-link">
                                <i class="bi bi-calendar-fill"></i>
                                <span>Jadwal</span>
                            </a>
                        </li>

                        {{-- Nilai & Absensi: khusus Guru --}}
                        @if(auth()->user()->isGuru())
                        <li class="sidebar-item {{ request()->is('nilai*') ? 'active' : '' }}">
                            <a href="{{ route('nilai.index') }}" class="sidebar-link">
                                <i class="bi bi-journal-fill"></i>
                                <span>Input Nilai</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->is('absensi*') ? 'active' : '' }}">
                            <a href="{{ route('absensi.index') }}" class="sidebar-link">
                                <i class="bi bi-check-square-fill"></i>
                                <span>Input Absensi</span>
                            </a>
                        </li>
                        @endif

                        {{-- Nilai & Absensi: khusus Siswa (lihat sendiri) --}}
                        @if(auth()->user()->isSiswa())
                        <li class="sidebar-item {{ request()->is('nilai*') ? 'active' : '' }}">
                            <a href="{{ route('nilai.index') }}" class="sidebar-link">
                                <i class="bi bi-journal-fill"></i>
                                <span>Nilai Saya</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->is('absensi*') ? 'active' : '' }}">
                            <a href="{{ route('absensi.index') }}" class="sidebar-link">
                                <i class="bi bi-check-square-fill"></i>
                                <span>Absensi Saya</span>
                            </a>
                        </li>
                        @endif

                        {{-- Laporan: Admin & Kepala Sekolah --}}
                        @if(auth()->user()->isAdmin() || auth()->user()->isKepalaSekolah())
                        <li class="sidebar-item {{ request()->is('laporan*') ? 'active' : '' }}">
                            <a href="{{ route('laporan.index') }}" class="sidebar-link">
                                <i class="bi bi-file-earmark-bar-graph-fill"></i>
                                <span>Laporan</span>
                            </a>
                        </li>
                        @endif

                        {{-- ── AKUN ── --}}
                        <li class="sidebar-title">Akun</li>

                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="bi bi-person-circle"></i>
                                <span>{{ auth()->user()->name }}</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link text-danger" onclick="
                                event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-left"></i>
                                <span>Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        {{-- Konten Utama --}}
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-content">
                @yield('content')
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>{{ date('Y') }} &copy; E-School - SMA Nusantara Bangsa</p>
                    </div>
                    <div class="float-end">
                        <p>Sistem Informasi Akademik</p>
                    </div>
                </div>
            </footer>
        </div>

    </div>

    <script src="{{ asset('assets/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('assets/compiled/js/app.js') }}"></script>
    @stack('scripts')
</body>

</html>