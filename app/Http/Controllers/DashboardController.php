<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\MataPelajaran;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = Siswa::count();
        $totalGuru  = Guru::count();
        $totalKelas = Kelas::count();
        $totalMapel = MataPelajaran::count();

        return view('dashboard.index', compact(
            'totalSiswa',
            'totalGuru',
            'totalKelas',
            'totalMapel'
        ));
    }
}