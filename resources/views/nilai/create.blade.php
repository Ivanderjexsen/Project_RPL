@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Input Nilai</h3>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Input Nilai</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('nilai.store') }}" method="POST">
                    @csrf

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Siswa <span class="text-danger">*</span></label>
                                <select name="siswa_id" class="form-select" required>
                                    <option value="">-- Pilih Siswa --</option>
                                    @foreach($siswas as $siswa)
                                    <option value="{{ $siswa->id }}">{{ $siswa->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Mata Pelajaran <span class="text-danger">*</span></label>
                                <select name="mata_pelajaran_id" class="form-select" required>
                                    <option value="">-- Pilih Mapel --</option>
                                    @foreach($mapels as $mapel)
                                    <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Semester <span class="text-danger">*</span></label>
                                <select name="semester" class="form-select" required>
                                    <option value="">-- Pilih Semester --</option>
                                    <option value="Ganjil">Ganjil</option>
                                    <option value="Genap">Genap</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Tahun Ajaran <span class="text-danger">*</span></label>
                                <input type="text" name="tahun_ajaran" class="form-control"
                                    placeholder="contoh: 2024/2025" value="{{ old('tahun_ajaran') }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label>Nilai Harian</label>
                                <input type="number" name="nilai_harian" class="form-control"
                                    min="0" max="100" step="0.01" value="{{ old('nilai_harian') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label>Nilai UTS</label>
                                <input type="number" name="nilai_uts" class="form-control"
                                    min="0" max="100" step="0.01" value="{{ old('nilai_uts') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label>Nilai UAS</label>
                                <input type="number" name="nilai_uas" class="form-control"
                                    min="0" max="100" step="0.01" value="{{ old('nilai_uas') }}">
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
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection