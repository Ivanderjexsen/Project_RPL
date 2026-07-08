<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Models\Guru;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    public function index()
    {
        $mapels = MataPelajaran::with('guru')->get();
        return view('mapel.index', compact('mapels'));
    }

    public function create()
    {
        $gurus = Guru::all();
        return view('mapel.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mapel'    => 'required|unique:mata_pelajarans',
            'nama_mapel'    => 'required',
            'jam_per_minggu'=> 'required|integer|min:1',
            'guru_id'       => 'required|exists:gurus,id',
        ]);

        MataPelajaran::create($request->all());

        return redirect()->route('mapel.index')
            ->with('success', 'Mata pelajaran berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $mapel = MataPelajaran::findOrFail($id);
        $gurus = Guru::all();
        return view('mapel.edit', compact('mapel', 'gurus'));
    }

    public function update(Request $request, $id)
    {
        $mapel = MataPelajaran::findOrFail($id);

        $request->validate([
            'kode_mapel'    => 'required|unique:mata_pelajarans,kode_mapel,'.$id,
            'nama_mapel'    => 'required',
            'jam_per_minggu'=> 'required|integer|min:1',
            'guru_id'       => 'required|exists:gurus,id',
        ]);

        $mapel->update($request->all());

        return redirect()->route('mapel.index')
            ->with('success', 'Mata pelajaran berhasil diupdate!');
    }

    public function destroy($id)
    {
        $mapel = MataPelajaran::findOrFail($id);
        $mapel->delete();

        return redirect()->route('mapel.index')
            ->with('success', 'Mata pelajaran berhasil dihapus!');
    }
}