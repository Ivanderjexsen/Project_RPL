@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Kelas</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('kelas.index') }}">Data Kelas</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        {{-- Info Kelas --}}
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Informasi Kelas</h4>
                @if(auth()->user()->isAdmin())
                <a href="{{ route('kelas.edit', $kelas->id) }}" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil"></i> Edit
                </a>
                @endif
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td width="160"><b>Nama Kelas</b></td>
                                <td>: {{ $kelas->nama_kelas }}</td>
                            </tr>
                            <tr>
                                <td><b>Tingkat</b></td>
                                <td>: {{ $kelas->tingkat }}</td>
                            </tr>
                            <tr>
                                <td><b>Jurusan</b></td>
                                <td>: {{ $kelas->jurusan }}</td>
                            </tr>
                            <tr>
                                <td><b>Wali Kelas</b></td>
                                <td>: {{ $kelas->waliKelas->nama_lengkap ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td><b>Jumlah Siswa</b></td>
                                <td>: {{ $kelas->siswas->count() }} siswa</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="mt-2">
                    <a href="{{ route('kelas.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>

        {{-- Daftar Siswa --}}
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Siswa Kelas {{ $kelas->nama_kelas }}</h4>
            </div>
            <div class="card-body">
                @if($kelas->siswas->isEmpty())
                    <p class="text-muted text-center">Belum ada siswa di kelas ini.</p>
                @else
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>No. Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kelas->siswas as $siswa)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $siswa->nis }}</td>
                            <td>{{ $siswa->nama_lengkap }}</td>
                            <td>{{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            <td>{{ $siswa->no_telp ?? '-' }}</td>
                            <td>
                                <a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </section>
</div>
@endsection
