@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Guru</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('guru.index') }}">Data Guru</a></li>
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
                        @if($guru->foto)
                            <img src="{{ asset('storage/'.$guru->foto) }}"
                                class="rounded-circle" width="150" height="150"
                                style="object-fit: cover;">
                        @else
                            <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center mx-auto"
                                style="width:150px;height:150px;">
                                <span class="text-white fw-bold" style="font-size:3rem;">
                                    {{ strtoupper(substr($guru->nama_lengkap, 0, 1)) }}
                                </span>
                            </div>
                        @endif
                        <h5 class="mt-3">{{ $guru->nama_lengkap }}</h5>
                        <span class="badge bg-primary">Guru</span>
                    </div>
                    <div class="col-md-9">
                        <table class="table table-borderless">
                            <tr>
                                <td width="200"><b>NIP</b></td>
                                <td>: {{ $guru->nip }}</td>
                            </tr>
                            <tr>
                                <td><b>Nama Lengkap</b></td>
                                <td>: {{ $guru->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <td><b>Jenis Kelamin</b></td>
                                <td>: {{ $guru->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            </tr>
                            <tr>
                                <td><b>No. Telepon</b></td>
                                <td>: {{ $guru->no_telp ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td><b>Email</b></td>
                                <td>: {{ $guru->user->email ?? '-' }}</td>
                            </tr>
                        </table>
                        <div class="mt-3">
                            <a href="{{ route('guru.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            @if(auth()->user()->isAdmin())
                            <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-warning">
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