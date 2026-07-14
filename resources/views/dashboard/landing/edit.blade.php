@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <h3>Kelola Landing Page</h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('dashboard.landing.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Judul Hero</label>
                        <input type="text" name="hero_title" class="form-control" value="{{ old('hero_title', $landing->hero_title ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Subjudul Hero</label>
                        <textarea name="hero_subtitle" class="form-control" rows="3">{{ old('hero_subtitle', $landing->hero_subtitle ?? '') }}</textarea>
                    </div>

                    <h5>Informasi Landing</h5>
                    @php
                        $cards = $landing->info_cards ?? [];
                        $informasi = collect($cards)->firstWhere('section', 'informasi');
                        $fasilitas = collect($cards)->firstWhere('section', 'fasilitas');
                        $ekskul = collect($cards)->firstWhere('section', 'ekskul');
                        $contact = collect($cards)->firstWhere('section', 'contact');
                    @endphp

                    <div class="mb-3">
                        <label class="form-label">Judul Informasi Sekolah</label>
                        <input type="text" name="informasi_title" class="form-control" value="{{ old('informasi_title', $informasi['title'] ?? 'Informasi Sekolah') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi Informasi Sekolah</label>
                        <textarea name="informasi_desc" class="form-control" rows="2">{{ old('informasi_desc', $informasi['desc'] ?? '') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto Informasi Sekolah</label>
                        @if(!empty($informasi['image']))
                            <div class="mb-2">
                                <img src="{{ asset('storage/'.$informasi['image']) }}" class="img-fluid rounded" style="max-width:260px;">
                            </div>
                        @endif
                        <input type="file" name="informasi_image" class="form-control" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Fasilitas</label>
                        <input type="text" name="fasilitas_title" class="form-control" value="{{ old('fasilitas_title', $fasilitas['title'] ?? 'Fasilitas') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi Fasilitas</label>
                        <textarea name="fasilitas_desc" class="form-control" rows="2">{{ old('fasilitas_desc', $fasilitas['desc'] ?? '') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto Fasilitas</label>
                        @if(!empty($fasilitas['image']))
                            <div class="mb-2">
                                <img src="{{ asset('storage/'.$fasilitas['image']) }}" class="img-fluid rounded" style="max-width:260px;">
                            </div>
                        @endif
                        <input type="file" name="fasilitas_image" class="form-control" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Ekskul</label>
                        <input type="text" name="ekskul_title" class="form-control" value="{{ old('ekskul_title', $ekskul['title'] ?? 'Daftar Ekstrakurikuler') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi Ekskul</label>
                        <textarea name="ekskul_desc" class="form-control" rows="2">{{ old('ekskul_desc', $ekskul['desc'] ?? '') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto Ekskul</label>
                        @if(!empty($ekskul['image']))
                            <div class="mb-2">
                                <img src="{{ asset('storage/'.$ekskul['image']) }}" class="img-fluid rounded" style="max-width:260px;">
                            </div>
                        @endif
                        <input type="file" name="ekskul_image" class="form-control" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Kontak</label>
                        <input type="text" name="contact_title" class="form-control" value="{{ old('contact_title', $contact['title'] ?? 'Kontak & Lokasi') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi Kontak</label>
                        <textarea name="contact_desc" class="form-control" rows="2">{{ old('contact_desc', $contact['desc'] ?? '') }}</textarea>
                    </div>

                    <button class="btn btn-primary mt-3">Simpan</button>
                </form>
            </div>
        </div>
    </section>
@endsection
