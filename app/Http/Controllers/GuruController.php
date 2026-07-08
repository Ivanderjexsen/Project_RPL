<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::with('user')->get();
        return view('guru.index', compact('gurus'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'  => 'required',
            'nip'           => 'required|unique:gurus',
            'email'         => 'required|email|unique:users',
            'password'      => 'required|min:6',
            'jenis_kelamin' => 'required',
        ]);

        $user = User::create([
            'name'     => $request->nama_lengkap,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'guru',
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('foto-guru', 'public');
        }

        Guru::create([
            'user_id'       => $user->id,
            'nip'           => $request->nip,
            'nama_lengkap'  => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp'       => $request->no_telp,
            'foto'          => $foto,
        ]);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambahkan!');
    }

    public function show($id)
    {
        $guru = Guru::with('user')->findOrFail($id);
        return view('guru.show', compact('guru'));
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nama_lengkap'  => 'required',
            'nip'           => 'required|unique:gurus,nip,'.$id,
            'jenis_kelamin' => 'required',
        ]);

        $foto = $guru->foto;
        if ($request->hasFile('foto')) {
            if ($foto) Storage::disk('public')->delete($foto);
            $foto = $request->file('foto')->store('foto-guru', 'public');
        }

        $guru->update([
            'nip'           => $request->nip,
            'nama_lengkap'  => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp'       => $request->no_telp,
            'foto'          => $foto,
        ]);

        $guru->user->update(['name' => $request->nama_lengkap]);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diupdate!');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        if ($guru->foto) Storage::disk('public')->delete($guru->foto);
        $guru->user->delete();
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus!');
    }
}