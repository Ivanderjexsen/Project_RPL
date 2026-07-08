@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Kelas</h3>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Edit Kelas</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label>Tingkat</label>
                                <select name="tingkat" class="form-select" required>
                                    <option value="X"   {{ $kelas->tingkat == 'X'   ? 'selected' : '' }}>X</option>
                                    <option value="XI"  {{ $kelas->tingkat == 'XI'  ? 'selected' : '' }}>XI</option>
                                    <option value="XII" {{ $kelas->tingkat == 'XII' ? 'selected' : '' }}>XII</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label>Jurusan</label>
                                <input type="text" name="jurusan" class="form-control"
                                    value="{{ $kelas->jurusan }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label>Nama Kelas</label>
                                <input type="text" name="nama_kelas" class="form-control"
                                    value="{{ $kelas->nama_kelas }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Wali Kelas</label>
                                <select name="wali_kelas_id" class="form-select">
                                    <option value="">-- Pilih Wali Kelas --</option>
                                    @foreach($gurus as $guru)
                                    <option value="{{ $guru->id }}" {{ $kelas->wali_kelas_id == $guru->id ? 'selected' : '' }}>
                                        {{ $guru->nama_lengkap }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection