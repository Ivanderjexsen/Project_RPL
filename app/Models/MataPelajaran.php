<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $fillable = [
        'kode_mapel',
        'nama_mapel',
        'jam_per_minggu',
        'guru_id',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }
}