<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Notifications\Notifiable;

class Penjamin extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    // protected $table = 'penjamins';

    public function pengajuan_luar_asrama()
    {
        return $this->hasMany(PengajuanLuarAsrama::class);
    }

    public function pengajuan_data_penjamin()
    {
        return $this->hasMany(PengajuanDataPenjamin::class);
    }
}
