@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Mata Pelajaran</h3>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Edit Mata Pelajaran</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('mapel.update', $mapel->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Kode Mapel</label>
                                <input type="text" name="kode_mapel" class="form-control"
                                    value="{{ $mapel->kode_mapel }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Nama Mata Pelajaran</label>
                                <input type="text" name="nama_mapel" class="form-control"
                                    value="{{ $mapel->nama_mapel }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Jam Per Minggu</label>
                                <input type="number" name="jam_per_minggu" class="form-control"
                                    value="{{ $mapel->jam_per_minggu }}" min="1" max="20" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Guru Pengampu</label>
                                <select name="guru_id" class="form-select" required>
                                    @foreach($gurus as $guru)
                                    <option value="{{ $guru->id }}" {{ $mapel->guru_id == $guru->id ? 'selected' : '' }}>
                                        {{ $guru->nama_lengkap }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('mapel.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection