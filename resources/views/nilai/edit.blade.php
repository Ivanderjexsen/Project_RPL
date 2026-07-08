@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Nilai</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('nilai.index') }}">Nilai</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Edit Nilai</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Siswa</label>
                                <input type="text" class="form-control"
                                    value="{{ $nilai->siswa->nama_lengkap }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Mata Pelajaran</label>
                                <input type="text" class="form-control"
                                    value="{{ $nilai->mataPelajaran->nama_mapel }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Semester</label>
                                <select name="semester" class="form-select" required>
                                    <option value="Ganjil" {{ $nilai->semester == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                                    <option value="Genap" {{ $nilai->semester == 'Genap' ? 'selected' : '' }}>Genap</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Tahun Ajaran</label>
                                <input type="text" name="tahun_ajaran" class="form-control"
                                    value="{{ $nilai->tahun_ajaran }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label>Nilai Harian</label>
                                <input type="number" name="nilai_harian" class="form-control"
                                    min="0" max="100" step="0.01"
                                    value="{{ $nilai->nilai_harian }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label>Nilai UTS</label>
                                <input type="number" name="nilai_uts" class="form-control"
                                    min="0" max="100" step="0.01"
                                    value="{{ $nilai->nilai_uts }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label>Nilai UAS</label>
                                <input type="number" name="nilai_uas" class="form-control"
                                    min="0" max="100" step="0.01"
                                    value="{{ $nilai->nilai_uas }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle"></i>
                                Nilai akhir dihitung otomatis: (Harian × 30%) + (UTS × 30%) + (UAS × 40%)
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('nilai.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection