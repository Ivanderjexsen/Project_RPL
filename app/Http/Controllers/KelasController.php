<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Guru;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with('waliKelas')->get();
        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        $gurus = Guru::all();
        return view('kelas.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tingkat'    => 'required',
            'jurusan'    => 'required',
            'nama_kelas' => 'required',
        ]);

        Kelas::create($request->all());

        return redirect()->route('kelas.index')
            ->with('success', 'Kelas berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        $gurus = Guru::all();
        return view('kelas.edit', compact('kelas', 'gurus'));
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);

        $request->validate([
            'tingkat'    => 'required',
            'jurusan'    => 'required',
            'nama_kelas' => 'required',
        ]);

        $kelas->update($request->all());

        return redirect()->route('kelas.index')
            ->with('success', 'Kelas berhasil diupdate!');
    }

    public function destroy($id)
    {
        Kelas::findOrFail($id)->delete();
        return redirect()->route('kelas.index')
            ->with('success', 'Kelas berhasil dihapus!');
    }
}