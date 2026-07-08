@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Mata Pelajaran</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Mata Pelajaran</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Daftar Mata Pelajaran</h4>
                @if(auth()->user()->isAdmin())
                <a href="{{ route('mapel.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus"></i> Tambah Mapel
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
                            <th>Kode Mapel</th>
                            <th>Nama Mapel</th>
                            <th>Jam/Minggu</th>
                            <th>Guru Pengampu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mapels as $mapel)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $mapel->kode_mapel }}</td>
                            <td>{{ $mapel->nama_mapel }}</td>
                            <td>{{ $mapel->jam_per_minggu }} jam</td>
                            <td>{{ $mapel->guru->nama_lengkap ?? '-' }}</td>
                            <td>
                                @if(auth()->user()->isAdmin())
                                <a href="{{ route('mapel.edit', $mapel->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('mapel.destroy', $mapel->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin hapus data ini?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data mata pelajaran</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection