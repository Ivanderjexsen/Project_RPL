<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\LaporanController;

// ─── Halaman Login ───────────────────────────────────
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ─── Halaman yang butuh login (pakai middleware auth) ─
Route::middleware('auth')->group(function () {

    Route::resource('mapel', MataPelajaranController::class);

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Data Siswa (CRUD)
    Route::resource('siswa', SiswaController::class);

    // Data Guru (CRUD)
    Route::resource('guru', GuruController::class);
    Route::resource('nilai', NilaiController::class);
    Route::resource('absensi', AbsensiController::class);

    // Data Kelas (CRUD)
    Route::resource('kelas', KelasController::class);

    Route::resource('jadwal', JadwalController::class);

    Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai.index');

    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

});