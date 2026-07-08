@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Jadwal</h3>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Tambah Jadwal</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('jadwal.store') }}" method="POST">
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
                                <label>Kelas <span class="text-danger">*</span></label>
                                <select name="kelas_id" class="form-select" required>
                                    <option value="">-- Pilih Kelas --</option>
                                    @foreach($kelas as $k)
                                    <option value="{{ $k->id }}" {{ old('kelas_id') == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama_kelas }}
                                    </option>
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
                                    <option value="{{ $mapel->id }}" {{ old('mata_pelajaran_id') == $mapel->id ? 'selected' : '' }}>
                                        {{ $mapel->nama_mapel }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Guru <span class="text-danger">*</span></label>
                                <select name="guru_id" class="form-select" required>
                                    <option value="">-- Pilih Guru --</option>
                                    @foreach($gurus as $guru)
                                    <option value="{{ $guru->id }}" {{ old('guru_id') == $guru->id ? 'selected' : '' }}>
                                        {{ $guru->nama_lengkap }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Hari <span class="text-danger">*</span></label>
                                <select name="hari" class="form-select" required>
                                    <option value="">-- Pilih Hari --</option>
                                    @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $hari)
                                    <option value="{{ $hari }}" {{ old('hari') == $hari ? 'selected' : '' }}>
                                        {{ $hari }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Jam Mulai <span class="text-danger">*</span></label>
                                <input type="time" name="jam_mulai" class="form-control"
                                    value="{{ old('jam_mulai') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Jam Selesai <span class="text-danger">*</span></label>
                                <input type="time" name="jam_selesai" class="form-control"
                                    value="{{ old('jam_selesai') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection