@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Data Guru</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('guru.index') }}">Data Guru</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Edit Guru</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control"
                                    value="{{ $guru->nama_lengkap }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>NIP</label>
                                <input type="text" name="nip" class="form-control"
                                    value="{{ $guru->nip }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-select" required>
                                    <option value="L" {{ $guru->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ $guru->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>No. Telepon</label>
                                <input type="text" name="no_telp" class="form-control"
                                    value="{{ $guru->no_telp }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Foto</label>
                                @if($guru->foto)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/'.$guru->foto) }}" width="80" class="rounded">
                                    </div>
                                @endif
                                <input type="file" name="foto" class="form-control" accept="image/*">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('guru.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection