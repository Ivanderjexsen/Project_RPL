<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-School</title>
    {{-- TAMBAH setelah meta viewport --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('assets/compiled/svg/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/auth.css') }}">
</head>

<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
    <a href="/" style="text-decoration: none;">
        <span style="
            font-family: 'Poppins', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: #435ebe;
            letter-spacing: -1px;
        ">📚 E-School</span>
    </a>
</div>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">
                        Selamat datang di <b>E-School</b>.<br>
                        Sistem Informasi Akademik SMA Nusantara Bangsa.
                    </p>

                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger mb-4">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email"
                                   name="email"
                                   class="form-control form-control-xl @error('email') is-invalid @enderror"
                                   placeholder="Email"
                                   value="{{ old('email') }}">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password"
                                   name="password"
                                   class="form-control form-control-xl"
                                   placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>

                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" name="remember" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Ingat saya
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                            Masuk
                        </button>
                        </form>
                            <div style="margin-top:12px;">
                                <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-block btn-lg mt-3">kembali</a>
                            </div>
                            <div class="text-center mt-4 text-muted">
                                <small>&copy; {{ date('Y') }} E-School - SMA Nusantara Bangsa</small>
                            </div>

                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                    <div class="d-flex flex-column justify-content-center align-items-center h-100 text-white">
                        <h1 class="fw-bold display-4">E-School</h1>
                        <p class="fs-5">Sistem Informasi Akademik</p>
                        <p class="fs-6">SMA Nusantara Bangsa</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
{{-- style untuk font --}}
<style>
    body, h1, h2, h3, p, input, button, label {
        font-family: 'Poppins', sans-serif !important;
    }
    .auth-title {
        font-family: 'Poppins', sans-serif !important;
        font-weight: 700;
    }
    #auth-right {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;
        color: white;
    }
    #auth-right h1 {
        font-size: 3rem;
        font-weight: 700;
        color: white !important;
    }
</style>
</body>

</html>