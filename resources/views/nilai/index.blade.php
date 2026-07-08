@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ auth()->user()->isSiswa() ? 'Nilai Saya' : 'Input Nilai' }}</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Nilai</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Daftar Nilai</h4>
                @if(auth()->user()->isGuru() || auth()->user()->isAdmin())
                <a href="{{ route('nilai.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus"></i> Input Nilai
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
                            <th>Semester</th>
                            <th>Tahun Ajaran</th>
                            <th>Nilai Harian</th>
                            <th>UTS</th>
                            <th>UAS</th>
                            <th>Nilai Akhir</th>
                            @if(auth()->user()->isGuru() || auth()->user()->isAdmin())
                            <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($nilais as $nilai)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            @if(!auth()->user()->isSiswa())
                            <td>{{ $nilai->siswa->nama_lengkap ?? '-' }}</td>
                            @endif
                            <td>{{ $nilai->mataPelajaran->nama_mapel ?? '-' }}</td>
                            <td>{{ $nilai->semester }}</td>
                            <td>{{ $nilai->tahun_ajaran }}</td>
                            <td>{{ $nilai->nilai_harian ?? '-' }}</td>
                            <td>{{ $nilai->nilai_uts ?? '-' }}</td>
                            <td>{{ $nilai->nilai_uas ?? '-' }}</td>
                            <td>
                                <span class="badge {{ $nilai->nilai_akhir >= 75 ? 'bg-success' : 'bg-danger' }}">
                                    {{ $nilai->nilai_akhir ?? '-' }}
                                </span>
                            </td>
                            @if(auth()->user()->isGuru() || auth()->user()->isAdmin())
                            <td>
                                <a href="{{ route('nilai.edit', $nilai->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('nilai.destroy', $nilai->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin hapus nilai ini?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center">Belum ada data nilai</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection