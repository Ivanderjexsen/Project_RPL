<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Jadwal;
use App\Models\Nilai;
use App\Models\Absensi;

class LaporanController extends Controller
{
    public function index()
    {
        $data = [
            'totalSiswa' => Siswa::count(),
            'totalGuru' => Guru::count(),
            'totalKelas' => Kelas::count(),
            'totalJadwal' => Jadwal::count(),
            'totalNilai' => Nilai::count(),
            'totalAbsensi' => Absensi::count(),
        ];

        return view('laporan.index', $data);
    }
}
