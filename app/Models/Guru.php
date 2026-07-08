<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = [
        'user_id',
        'nip',
        'nama_lengkap',
        'jenis_kelamin',
        'no_telp',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mataPelajarans()
    {
        return $this->hasMany(MataPelajaran::class);
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function waliKelas()
    {
        return $this->hasOne(Kelas::class, 'wali_kelas_id');
    }
}