<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = [
        'siswa_id',
        'mata_pelajaran_id',
        'semester',
        'tahun_ajaran',
        'nilai_harian',
        'nilai_uts',
        'nilai_uas',
        'nilai_akhir',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class);
    }
}