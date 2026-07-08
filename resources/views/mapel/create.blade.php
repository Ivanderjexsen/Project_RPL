@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Mata Pelajaran</h3>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Tambah Mata Pelajaran</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('mapel.store') }}" method="POST">
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
                                <label>Kode Mapel <span class="text-danger">*</span></label>
                                <input type="text" name="kode_mapel" class="form-control"
                                    value="{{ old('kode_mapel') }}" placeholder="contoh: MTK, BIN, ING" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Nama Mata Pelajaran <span class="text-danger">*</span></label>
                                <input type="text" name="nama_mapel" class="form-control"
                                    value="{{ old('nama_mapel') }}" placeholder="contoh: Matematika" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Jam Per Minggu <span class="text-danger">*</span></label>
                                <input type="number" name="jam_per_minggu" class="form-control"
                                    value="{{ old('jam_per_minggu') }}" min="1" max="20" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Guru Pengampu <span class="text-danger">*</span></label>
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
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('mapel.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection