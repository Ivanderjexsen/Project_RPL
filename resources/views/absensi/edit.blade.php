@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Absensi</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('absensi.index') }}">Absensi</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Edit Absensi</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('absensi.update', $absensi->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Siswa</label>
                                <input type="text" class="form-control"
                                    value="{{ $absensi->siswa->nama_lengkap }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Jadwal</label>
                                <input type="text" class="form-control"
                                    value="{{ $absensi->jadwal->mataPelajaran->nama_mapel ?? '-' }} - {{ $absensi->jadwal->hari }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" class="form-control"
                                    value="{{ $absensi->tanggal }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="hadir"  {{ $absensi->status == 'hadir'  ? 'selected' : '' }}>Hadir</option>
                                    <option value="sakit"  {{ $absensi->status == 'sakit'  ? 'selected' : '' }}>Sakit</option>
                                    <option value="izin"   {{ $absensi->status == 'izin'   ? 'selected' : '' }}>Izin</option>
                                    <option value="alpha"  {{ $absensi->status == 'alpha'  ? 'selected' : '' }}>Alpha</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label>Keterangan</label>
                                <textarea name="keterangan" class="form-control" rows="2">{{ $absensi->keterangan }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('absensi.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection