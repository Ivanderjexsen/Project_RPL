<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Guru;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->isGuru()) {
            $jadwals = Jadwal::with(['kelas', 'mataPelajaran', 'guru'])
                ->where('guru_id', $user->guru->id)
                ->get();
        } elseif ($user->isSiswa()) {
            $jadwals = Jadwal::with(['kelas', 'mataPelajaran', 'guru'])
                ->where('kelas_id', $user->siswa->kelas_id)
                ->get();
        } else {
            $jadwals = Jadwal::with(['kelas', 'mataPelajaran', 'guru'])->get();
        }

        return view('jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        $kelas  = Kelas::all();
        $gurus  = Guru::all();
        $mapels = MataPelajaran::all();
        return view('jadwal.create', compact('kelas', 'gurus', 'mapels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas_id'          => 'required',
            'mata_pelajaran_id' => 'required',
            'guru_id'           => 'required',
            'hari'              => 'required',
            'jam_mulai'         => 'required',
            'jam_selesai'       => 'required',
        ]);

        Jadwal::create($request->all());

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $kelas  = Kelas::all();
        $gurus  = Guru::all();
        $mapels = MataPelajaran::all();
        return view('jadwal.edit', compact('jadwal', 'kelas', 'gurus', 'mapels'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $request->validate([
            'kelas_id'          => 'required',
            'mata_pelajaran_id' => 'required',
            'guru_id'           => 'required',
            'hari'              => 'required',
            'jam_mulai'         => 'required',
            'jam_selesai'       => 'required',
        ]);

        $jadwal->update($request->all());

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil diupdate!');
    }

    public function destroy($id)
    {
        Jadwal::findOrFail($id)->delete();
        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus!');
    }
}