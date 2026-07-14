<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-School - Landing</title>
    <link rel="shortcut icon" href="{{ asset('assets/compiled/svg/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
    <style>
        :root{--primary:#435ebe;--muted:#6b7280}
        *{box-sizing:border-box}
        body{margin:0;font-family:Inter,ui-sans-serif,system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue",Arial;color:#111}
        header{padding:18px 32px;display:flex;align-items:center;justify-content:space-between}
        .logo { font-weight:700; color:var(--primary); font-size:18px }
        .top-right { display:flex;gap:12px;align-items:center }
        .btn-primary{background:var(--primary);color:#fff;padding:10px 14px;border-radius:8px;text-decoration:none;display:inline-block}
        .btn-ghost{background:transparent;color:var(--primary);padding:8px 12px;border-radius:8px;border:1px solid rgba(67,90,190,0.12);text-decoration:none}

        .hero{height:72vh;display:flex;align-items:center;padding:40px 32px;background:linear-gradient(120deg,#f6f8ff 0%, #D0E7E6 40%);gap:40px}
        .hero-inner{max-width:780px}
        .hero h1{font-size:44px;margin:0 0 12px}
        .hero p.lead{font-size:18px;color:var(--muted);margin:0 0 20px}

        .hero-visual{flex:1;display:flex;align-items:center;justify-content:center}
        .card-visual{width:320px;height:220px;border-radius:12px;background:linear-gradient(180deg,rgba(67,90,190,0.12),rgba(67,90,190,0.05));display:flex;align-items:center;justify-content:center;flex-direction:column;color:var(--primary)}
        .features{display:flex;gap:16px;padding:28px 32px}
        .feature{flex:1;background:#fff;border-radius:10px;padding:18px;box-shadow:0 6px 18px rgba(16,24,40,0.06)}
        .feature h4{margin:0 0 8px}

        /* Info cards */
        .info-section{padding:40px 32px;background:#f4f8ff}
        .cards-grid{display:grid;grid-template-columns:1fr;gap:20px;max-width:1180px;margin:0 auto}
        .landing-card{background:linear-gradient(180deg,#ffffff,#eef6ff);border:1px solid rgba(67,90,190,0.16);border-radius:32px;padding:32px;box-shadow:0 30px 70px rgba(67,90,190,0.08)}
        .landing-card-top{display:flex;align-items:flex-start;gap:20px;}
        .landing-card-icon{width:68px;height:68px;border-radius:22px;background:rgba(67,90,190,0.15);display:flex;align-items:center;justify-content:center;font-size:28px;color:var(--primary)}
        .landing-card-top h3{margin:0;font-size:28px;color:#1f2a56;line-height:1.1}
        .landing-card-top .eyebrow{display:inline-block;margin-bottom:10px;color:var(--primary);font-size:13px;font-weight:700;text-transform:uppercase;letter-spacing:.08em}
        .landing-card-intro{margin:0;color:#475569;font-size:16px;line-height:1.85;max-width:760px}
        .landing-card-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:18px;margin-top:28px}
        .section-item{background:#fff;border:1px solid rgba(67,90,190,0.12);border-radius:22px;padding:22px;display:flex;gap:16px;align-items:flex-start;min-height:140px}
        .section-badge{width:40px;height:40px;border-radius:14px;background:rgba(67,90,190,0.14);display:flex;align-items:center;justify-content:center;color:var(--primary);font-weight:700;font-size:15px}
        .section-content{flex:1;display:flex;flex-direction:column;gap:14px}
        .section-item h4{margin:0;font-size:17px;color:#1f2a56}
        .section-item p{margin:0;color:#5b6a82;font-size:14px;line-height:1.8}
        .section-image{width:160px;min-width:160px;height:120px;border-radius:18px;overflow:hidden;box-shadow:0 8px 16px rgba(16,24,40,0.08)}
        .section-image img{width:100%;height:100%;object-fit:cover;display:block}
        .landing-card-grid .section-item:nth-child(odd){background:rgba(255,255,255,0.98)}
        .landing-card-grid .section-item:nth-child(even){background:rgba(247,250,255,0.98)}

        @media (max-width:900px){.hero{flex-direction:column;height:auto}.hero-visual{order:2}.hero-inner{order:1;text-align:center}.cards-grid{grid-template-columns:1fr;max-width:100%;padding:0 16px}.landing-card-grid{grid-template-columns:1fr}.section-item{flex-direction:column}.section-image{width:100%;min-width:auto;height:180px}}
    </style>
</head>

<body>
    <header>
        <div class="logo">E-School — SMA Nusantara Bangsa</div>
        <div class="top-right">
            <a href="#about" class="btn-ghost">Pelajari</a>
            <a href="{{ route('login') }}" class="btn-primary">Login</a>
        </div>
    </header>

    <main>
        @php $landingData = App\Models\Landing::first(); @endphp
        <section class="hero">
            <div class="hero-inner">
                <h1>{{ $landingData->hero_title ?? 'Sistem Informasi Akademik' }}</h1>
                <p class="lead">{{ $landingData->hero_subtitle ?? 'Kelola siswa, guru, jadwal, absensi, dan penilaian dalam satu sistem yang mudah digunakan.' }}</p>
                <div style="display:flex;gap:12px">
                    
                </div>
            </div>
            <div class="hero-visual">
                <div class="card-visual">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 3L2 7l10 4 10-4-10-4z" fill="#435ebe"/><path d="M2 17l10 4 10-4" stroke="#435ebe" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <div style="margin-top:10px;font-weight:600">E-School</div>
                    <div style="font-size:12px;color:var(--muted)">Sistem Informasi Akademik</div>
                </div>
            </div>
        </section>

        <section class="info-section">
            <div class="cards-grid">
                <div class="landing-card">
                    <div class="landing-card-top">
                        <div class="landing-card-icon">i</div>
                        <div>
                            <span class="eyebrow">Informasi Utama</span>
                            <h3>{{ $landingData->hero_title ?? 'Informasi Sekolah Lengkap' }}</h3>
                            <p class="landing-card-intro">{{ $landingData->hero_subtitle ?? 'Detail fitur sekolah, fasilitas, ekstrakurikuler, kontak dan informasi penting lainnya dalam satu kartu lengkap.' }}</p>
                        </div>
                    </div>

                    @php
                        $cards = $landingData && is_array($landingData->info_cards) ? $landingData->info_cards : [];
                    @endphp

                    <div class="landing-card-grid">
                        @if(count($cards) > 0)
                            @foreach($cards as $index => $card)
                                <div class="section-item">
                                    <div class="section-badge">{{ $index + 1 }}</div>
                                    <div class="section-content">
                                        <h4>{{ $card['title'] ?? '' }}</h4>
                                        <p>{{ $card['desc'] ?? '' }}</p>
                                    </div>
                                    @if(!empty($card['image']))
                                        <div class="section-image">
                                            <img src="{{ asset('storage/'.$card['image']) }}" alt="{{ $card['title'] ?? 'section image' }}">
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <div class="section-item">
                                <div class="section-badge">1</div>
                                <div>
                                    <h4>Informasi Sekolah</h4>
                                    <p>Sejarah singkat, visi & misi, dan profil guru serta tenaga kependidikan.</p>
                                </div>
                            </div>
                            <div class="section-item">
                                <div class="section-badge">2</div>
                                <div>
                                    <h4>Fasilitas</h4>
                                    <p>Ruang kelas, laboratorium, perpustakaan, lapangan olahraga, dan fasilitas penunjang lainnya.</p>
                                </div>
                            </div>
                            <div class="section-item">
                                <div class="section-badge">3</div>
                                <div>
                                    <h4>Ekstrakurikuler</h4>
                                    <p>Daftar ekskul populer: basket, pramuka, seni musik, robotika, dan lain-lain.</p>
                                </div>
                            </div>
                            <div class="section-item">
                                <div class="section-badge">4</div>
                                <div>
                                    <h4>Kontak & Lokasi</h4>
                                    <p>Alamat, nomor telepon, email, dan peta lokasi sekolah.</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

    </main>

</body>

</html>
