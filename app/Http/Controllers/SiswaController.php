<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with('kelas')->get();
        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nis'          => 'required|unique:siswas',
            'email'        => 'required|email|unique:users',
            'password'     => 'required|min:6',
            'kelas_id'     => 'required',
            'jenis_kelamin'=> 'required',
        ]);

        // Buat user login dulu
        $user = User::create([
            'name'     => $request->nama_lengkap,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'siswa',
        ]);

        // Upload foto
        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('foto-siswa', 'public');
        }

        // Simpan data siswa
        Siswa::create([
            'user_id'          => $user->id,
            'nis'              => $request->nis,
            'nama_lengkap'     => $request->nama_lengkap,
            'kelas_id'         => $request->kelas_id,
            'jenis_kelamin'    => $request->jenis_kelamin,
            'tanggal_lahir'    => $request->tanggal_lahir,
            'tempat_lahir'     => $request->tempat_lahir,
            'alamat'           => $request->alamat,
            'no_telp'          => $request->no_telp,
            'nama_orang_tua'   => $request->nama_orang_tua,
            'no_telp_orang_tua'=> $request->no_telp_orang_tua,
            'foto'             => $foto,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function show($id)
    {
        $siswa = Siswa::with('kelas')->findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();
        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nama_lengkap'  => 'required',
            'nis'           => 'required|unique:siswas,nis,'.$id,
            'kelas_id'      => 'required',
            'jenis_kelamin' => 'required',
        ]);

        // Upload foto baru
        $foto = $siswa->foto;
        if ($request->hasFile('foto')) {
            if ($foto) Storage::disk('public')->delete($foto);
            $foto = $request->file('foto')->store('foto-siswa', 'public');
        }

        $siswa->update([
            'nis'              => $request->nis,
            'nama_lengkap'     => $request->nama_lengkap,
            'kelas_id'         => $request->kelas_id,
            'jenis_kelamin'    => $request->jenis_kelamin,
            'tanggal_lahir'    => $request->tanggal_lahir,
            'tempat_lahir'     => $request->tempat_lahir,
            'alamat'           => $request->alamat,
            'no_telp'          => $request->no_telp,
            'nama_orang_tua'   => $request->nama_orang_tua,
            'no_telp_orang_tua'=> $request->no_telp_orang_tua,
            'foto'             => $foto,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diupdate!');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        if ($siswa->foto) Storage::disk('public')->delete($siswa->foto);
        $siswa->user->delete();
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus!');
    }
}