<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->isSiswa()) {
            $nilais = Nilai::with('mataPelajaran')
                ->where('siswa_id', $user->siswa->id)
                ->get();
        } else {
            $nilais = Nilai::with(['siswa', 'mataPelajaran'])->get();
        }

        return view('nilai.index', compact('nilais'));
    }

    public function create()
    {
        $siswas = Siswa::all();
        $mapels = MataPelajaran::all();
        return view('nilai.create', compact('siswas', 'mapels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id'          => 'required',
            'mata_pelajaran_id' => 'required',
            'semester'          => 'required',
            'tahun_ajaran'      => 'required',
        ]);

        // Hitung nilai akhir otomatis
        $nilaiAkhir = null;
        if ($request->nilai_harian && $request->nilai_uts && $request->nilai_uas) {
            $nilaiAkhir = ($request->nilai_harian * 0.3) +
                          ($request->nilai_uts * 0.3) +
                          ($request->nilai_uas * 0.4);
        }

        Nilai::create([
            'siswa_id'          => $request->siswa_id,
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
            'semester'          => $request->semester,
            'tahun_ajaran'      => $request->tahun_ajaran,
            'nilai_harian'      => $request->nilai_harian,
            'nilai_uts'         => $request->nilai_uts,
            'nilai_uas'         => $request->nilai_uas,
            'nilai_akhir'       => $nilaiAkhir,
        ]);

        return redirect()->route('nilai.index')
            ->with('success', 'Nilai berhasil disimpan!');
    }

    public function edit($id)
    {
        $nilai  = Nilai::findOrFail($id);
        $siswas = Siswa::all();
        $mapels = MataPelajaran::all();
        return view('nilai.edit', compact('nilai', 'siswas', 'mapels'));
    }

    public function update(Request $request, $id)
    {
        $nilai = Nilai::findOrFail($id);

        $nilaiAkhir = null;
        if ($request->nilai_harian && $request->nilai_uts && $request->nilai_uas) {
            $nilaiAkhir = ($request->nilai_harian * 0.3) +
                          ($request->nilai_uts * 0.3) +
                          ($request->nilai_uas * 0.4);
        }

        $nilai->update([
            'semester'     => $request->semester,
            'tahun_ajaran' => $request->tahun_ajaran,
            'nilai_harian' => $request->nilai_harian,
            'nilai_uts'    => $request->nilai_uts,
            'nilai_uas'    => $request->nilai_uas,
            'nilai_akhir'  => $nilaiAkhir,
        ]);

        return redirect()->route('nilai.index')
            ->with('success', 'Nilai berhasil diupdate!');
    }

    public function destroy($id)
    {
        Nilai::findOrFail($id)->delete();
        return redirect()->route('nilai.index')
            ->with('success', 'Nilai berhasil dihapus!');
    }
}