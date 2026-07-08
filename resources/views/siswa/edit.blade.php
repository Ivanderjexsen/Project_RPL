@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Data Siswa</h3>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Edit Siswa</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control"
                                    value="{{ $siswa->nama_lengkap }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>NIS</label>
                                <input type="text" name="nis" class="form-control"
                                    value="{{ $siswa->nis }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Kelas</label>
                                <select name="kelas_id" class="form-select" required>
                                    @foreach($kelas as $k)
                                    <option value="{{ $k->id }}" {{ $siswa->kelas_id == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama_kelas }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-select" required>
                                    <option value="L" {{ $siswa->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ $siswa->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control"
                                    value="{{ $siswa->tempat_lahir }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control"
                                    value="{{ $siswa->tanggal_lahir }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>No. Telepon</label>
                                <input type="text" name="no_telp" class="form-control"
                                    value="{{ $siswa->no_telp }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Nama Orang Tua</label>
                                <input type="text" name="nama_orang_tua" class="form-control"
                                    value="{{ $siswa->nama_orang_tua }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>No. Telepon Orang Tua</label>
                                <input type="text" name="no_telp_orang_tua" class="form-control"
                                    value="{{ $siswa->no_telp_orang_tua }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3">{{ $siswa->alamat }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Foto</label>
                                @if($siswa->foto)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/'.$siswa->foto) }}" width="80" class="rounded">
                                    </div>
                                @endif
                                <input type="file" name="foto" class="form-control" accept="image/*">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection 