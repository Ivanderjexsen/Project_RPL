<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        $kelas = [
            // Kelas X
            ['tingkat' => 'X',   'jurusan' => 'RPL', 'nama_kelas' => 'X RPL 1'],
            ['tingkat' => 'X',   'jurusan' => 'RPL', 'nama_kelas' => 'X RPL 2'],
            ['tingkat' => 'X',   'jurusan' => 'TKJ', 'nama_kelas' => 'X TKJ 1'],
            // Kelas XI
            ['tingkat' => 'XI',  'jurusan' => 'RPL', 'nama_kelas' => 'XI RPL 1'],
            ['tingkat' => 'XI',  'jurusan' => 'RPL', 'nama_kelas' => 'XI RPL 2'],
            ['tingkat' => 'XI',  'jurusan' => 'TKJ', 'nama_kelas' => 'XI TKJ 1'],
            // Kelas XII
            ['tingkat' => 'XII', 'jurusan' => 'RPL', 'nama_kelas' => 'XII RPL 1'],
            ['tingkat' => 'XII', 'jurusan' => 'RPL', 'nama_kelas' => 'XII RPL 2'],
            ['tingkat' => 'XII', 'jurusan' => 'TKJ', 'nama_kelas' => 'XII TKJ 1'],
        ];

        foreach ($kelas as $item) {
            Kelas::create($item);
        }
    }
}