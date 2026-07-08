@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Siswa</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('siswa.index') }}">Data Siswa</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 text-center mb-4">
                        @if($siswa->foto)
                            <img src="{{ asset('storage/'.$siswa->foto) }}"
                                class="rounded-circle" width="150" height="150"
                                style="object-fit: cover;">
                        @else
                            <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center mx-auto"
                                style="width:150px;height:150px;">
                                <span class="text-white fw-bold" style="font-size:3rem;">
                                    {{ strtoupper(substr($siswa->nama_lengkap, 0, 1)) }}
                                </span>
                            </div>
                        @endif
                        <h5 class="mt-3">{{ $siswa->nama_lengkap }}</h5>
                        <span class="badge bg-success">Siswa</span>
                    </div>
                    <div class="col-md-9">
                        <table class="table table-borderless">
                            <tr>
                                <td width="200"><b>NIS</b></td>
                                <td>: {{ $siswa->nis }}</td>
                            </tr>
                            <tr>
                                <td><b>Nama Lengkap</b></td>
                                <td>: {{ $siswa->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <td><b>Kelas</b></td>
                                <td>: {{ $siswa->kelas->nama_kelas ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td><b>Jenis Kelamin</b></td>
                                <td>: {{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            </tr>
                            <tr>
                                <td><b>Tempat, Tanggal Lahir</b></td>
                                <td>: {{ $siswa->tempat_lahir ?? '-' }}, {{ $siswa->tanggal_lahir ? \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d M Y') : '-' }}</td>
                            </tr>
                            <tr>
                                <td><b>Alamat</b></td>
                                <td>: {{ $siswa->alamat ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td><b>No. Telepon</b></td>
                                <td>: {{ $siswa->no_telp ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td><b>Nama Orang Tua</b></td>
                                <td>: {{ $siswa->nama_orang_tua ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td><b>No. Telp Orang Tua</b></td>
                                <td>: {{ $siswa->no_telp_orang_tua ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td><b>Email</b></td>
                                <td>: {{ $siswa->user->email ?? '-' }}</td>
                            </tr>
                        </table>
                        <div class="mt-3">
                            <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            @if(auth()->user()->isAdmin() || auth()->user()->isSiswa())
                            <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection