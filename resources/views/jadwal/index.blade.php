@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Jadwal Pelajaran</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Jadwal</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Daftar Jadwal</h4>
                @if(auth()->user()->isAdmin())
                <a href="{{ route('jadwal.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus"></i> Tambah Jadwal
                </a>
                @endif
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru</th>
                            <th>Hari</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            @if(auth()->user()->isAdmin())
                            <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jadwals as $jadwal)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $jadwal->kelas->nama_kelas ?? '-' }}</td>
                            <td>{{ $jadwal->mataPelajaran->nama_mapel ?? '-' }}</td>
                            <td>{{ $jadwal->guru->nama_lengkap ?? '-' }}</td>
                            <td>{{ $jadwal->hari }}</td>
                            <td>{{ $jadwal->jam_mulai }}</td>
                            <td>{{ $jadwal->jam_selesai }}</td>
                            @if(auth()->user()->isAdmin())
                            <td>
                                <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin hapus jadwal ini?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Belum ada jadwal</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection