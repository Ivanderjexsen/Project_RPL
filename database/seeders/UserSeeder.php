<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Admin
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@sekolah.com',
            'password' => Hash::make('password'),
            'role'     => 'admin',
        ]);

        // Akun Kepala Sekolah
        User::create([
            'name'     => 'Kepala Sekolah',
            'email'    => 'kepsek@sekolah.com',
            'password' => Hash::make('password'),
            'role'     => 'kepala_sekolah',
        ]);

        // Akun Guru
        User::create([
            'name'     => 'Guru Contoh',
            'email'    => 'guru@sekolah.com',
            'password' => Hash::make('password'),
            'role'     => 'guru',
        ]);

        // Akun Siswa
        User::create([
            'name'     => 'Siswa Contoh',
            'email'    => 'siswa@sekolah.com',
            'password' => Hash::make('password'),
            'role'     => 'siswa',
        ]);
    }
}