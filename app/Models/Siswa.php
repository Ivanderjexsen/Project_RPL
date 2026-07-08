<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'user_id',
        'nis',
        'nama_lengkap',
        'kelas_id',
        'jenis_kelamin',
        'tanggal_lahir',
        'tempat_lahir',
        'alamat',
        'no_telp',
        'nama_orang_tua',
        'no_telp_orang_tua',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
}