@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Kelas</h3>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Tambah Kelas</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('kelas.store') }}" method="POST">
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
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label>Tingkat <span class="text-danger">*</span></label>
                                <select name="tingkat" class="form-select" required>
                                    <option value="">-- Pilih Tingkat --</option>
                                    <option value="X"   {{ old('tingkat') == 'X'   ? 'selected' : '' }}>X</option>
                                    <option value="XI"  {{ old('tingkat') == 'XI'  ? 'selected' : '' }}>XI</option>
                                    <option value="XII" {{ old('tingkat') == 'XII' ? 'selected' : '' }}>XII</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label>Jurusan <span class="text-danger">*</span></label>
                                <input type="text" name="jurusan" class="form-control"
                                    placeholder="contoh: RPL, TKJ, AKL"
                                    value="{{ old('jurusan') }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label>Nama Kelas <span class="text-danger">*</span></label>
                                <input type="text" name="nama_kelas" class="form-control"
                                    placeholder="contoh: X RPL 1"
                                    value="{{ old('nama_kelas') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Wali Kelas</label>
                                <select name="wali_kelas_id" class="form-select">
                                    <option value="">-- Pilih Wali Kelas --</option>
                                    @foreach($gurus as $guru)
                                    <option value="{{ $guru->id }}" {{ old('wali_kelas_id') == $guru->id ? 'selected' : '' }}>
                                        {{ $guru->nama_lengkap }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection