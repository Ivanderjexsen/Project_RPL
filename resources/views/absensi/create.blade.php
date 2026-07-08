@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Input Absensi</h3>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Input Absensi</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('absensi.store') }}" method="POST">
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
                                <label>Jadwal <span class="text-danger">*</span></label>
                                <select name="jadwal_id" class="form-select" required>
                                    <option value="">-- Pilih Jadwal --</option>
                                    @foreach($jadwals as $jadwal)
                                    <option value="{{ $jadwal->id }}">
                                        {{ $jadwal->mataPelajaran->nama_mapel ?? '-' }} -
                                        {{ $jadwal->kelas->nama_kelas ?? '-' }} -
                                        {{ $jadwal->hari }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Tanggal <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal" class="form-control"
                                    value="{{ old('tanggal', date('Y-m-d')) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-select" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="hadir">Hadir</option>
                                    <option value="sakit">Sakit</option>
                                    <option value="izin">Izin</option>
                                    <option value="alpha">Alpha</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label>Keterangan</label>
                                <textarea name="keterangan" class="form-control" rows="2">{{ old('keterangan') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('absensi.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection