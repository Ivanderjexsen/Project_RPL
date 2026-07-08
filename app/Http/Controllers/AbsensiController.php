<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Siswa;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->isSiswa()) {
            $absensis = Absensi::with('jadwal.mataPelajaran')
                ->where('siswa_id', $user->siswa->id)
                ->get();
        } else {
            $absensis = Absensi::with(['siswa', 'jadwal.mataPelajaran'])->get();
        }

        return view('absensi.index', compact('absensis'));
    }

    public function create()
    {
        $siswas  = Siswa::all();
        $jadwals = Jadwal::with(['kelas', 'mataPelajaran'])->get();
        return view('absensi.create', compact('siswas', 'jadwals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id'   => 'required',
            'jadwal_id'  => 'required',
            'tanggal'    => 'required|date',
            'status'     => 'required',
        ]);

        Absensi::create($request->all());

        return redirect()->route('absensi.index')
            ->with('success', 'Absensi berhasil disimpan!');
    }

    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);
        $siswas  = Siswa::all();
        $jadwals = Jadwal::with(['kelas', 'mataPelajaran'])->get();
        return view('absensi.edit', compact('absensi', 'siswas', 'jadwals'));
    }

    public function update(Request $request, $id)
    {
        $absensi = Absensi::findOrFail($id);

        $request->validate([
            'tanggal' => 'required|date',
            'status'  => 'required',
        ]);

        $absensi->update($request->all());

        return redirect()->route('absensi.index')
            ->with('success', 'Absensi berhasil diupdate!');
    }

    public function destroy($id)
    {
        Absensi::findOrFail($id)->delete();
        return redirect()->route('absensi.index')
            ->with('success', 'Absensi berhasil dihapus!');
    }
}