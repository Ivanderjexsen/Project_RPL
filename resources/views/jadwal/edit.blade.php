@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Jadwal</h3>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Edit Jadwal</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Kelas</label>
                                <select name="kelas_id" class="form-select" required>
                                    @foreach($kelas as $k)
                                    <option value="{{ $k->id }}" {{ $jadwal->kelas_id == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama_kelas }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Mata Pelajaran</label>
                                <select name="mata_pelajaran_id" class="form-select" required>
                                    @foreach($mapels as $mapel)
                                    <option value="{{ $mapel->id }}" {{ $jadwal->mata_pelajaran_id == $mapel->id ? 'selected' : '' }}>
                                        {{ $mapel->nama_mapel }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Guru</label>
                                <select name="guru_id" class="form-select" required>
                                    @foreach($gurus as $guru)
                                    <option value="{{ $guru->id }}" {{ $jadwal->guru_id == $guru->id ? 'selected' : '' }}>
                                        {{ $guru->nama_lengkap }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Hari</label>
                                <select name="hari" class="form-select" required>
                                    @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $hari)
                                    <option value="{{ $hari }}" {{ $jadwal->hari == $hari ? 'selected' : '' }}>
                                        {{ $hari }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Jam Mulai</label>
                                <input type="time" name="jam_mulai" class="form-control"
                                    value="{{ $jadwal->jam_mulai }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Jam Selesai</label>
                                <input type="time" name="jam_selesai" class="form-control"
                                    value="{{ $jadwal->jam_selesai }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection