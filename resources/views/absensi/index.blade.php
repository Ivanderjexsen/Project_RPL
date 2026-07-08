@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ auth()->user()->isSiswa() ? 'Absensi Saya' : 'Input Absensi' }}</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Absensi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Daftar Absensi</h4>
                @if(auth()->user()->isGuru() || auth()->user()->isAdmin())
                <a href="{{ route('absensi.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus"></i> Input Absensi
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
                            @if(!auth()->user()->isSiswa())
                            <th>Nama Siswa</th>
                            @endif
                            <th>Mata Pelajaran</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            @if(auth()->user()->isGuru() || auth()->user()->isAdmin())
                            <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($absensis as $absensi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            @if(!auth()->user()->isSiswa())
                            <td>{{ $absensi->siswa->nama_lengkap ?? '-' }}</td>
                            @endif
                            <td>{{ $absensi->jadwal->mataPelajaran->nama_mapel ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($absensi->tanggal)->format('d M Y') }}</td>
                            <td>
                                @php
                                    $badge = [
                                        'hadir' => 'bg-success',
                                        'sakit' => 'bg-warning',
                                        'izin'  => 'bg-info',
                                        'alpha' => 'bg-danger',
                                    ];
                                @endphp
                                <span class="badge {{ $badge[$absensi->status] ?? 'bg-secondary' }}">
                                    {{ ucfirst($absensi->status) }}
                                </span>
                            </td>
                            <td>{{ $absensi->keterangan ?? '-' }}</td>
                            @if(auth()->user()->isGuru() || auth()->user()->isAdmin())
                            <td>
                                <a href="{{ route('absensi.edit', $absensi->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('absensi.destroy', $absensi->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin hapus absensi ini?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Belum ada data absensi</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection