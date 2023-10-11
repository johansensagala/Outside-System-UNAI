<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Notifications\Notifiable;

class BiroKemahasiswaan extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    protected $table = 'biro_kemahasiswaans';

    public function absensi ()
    {
        return $this->hasMany(Absensi::class);
    }

    public function pengajuan_luar_asrama ()
    {
        return $this->hasMany(PengajuanLuarAsrama::class);
    }

    public function pengajuan_data_tempat_tinggal ()
    {
        return $this->hasMany(PengajuanDataTempatTinggal::class);
    }
}
