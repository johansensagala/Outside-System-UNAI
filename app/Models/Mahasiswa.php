<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Notifications\Notifiable;


class Mahasiswa extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    public function absensi ()
    {
        return $this->hasMany(Absensi::class);
    }

    public function pengajuan_luar_asrama ()
    {
        return $this->hasMany(PengajuanLuarAsrama::class, 'id_mahasiswa');
    }
}
