<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $table = 'antrian';
    protected $primaryKey = 'id';
    protected $fillable = [
    'kode_antrian', 
    'pasien_id', 
    'dokter_id', 
    'jadwal_id', 
    'keluhan', 
    'status', 
    'waktu_daftar', 
    'waktu_panggil'
    ];

    public function antrian()
    {
        return $this->hasMany(Antrian::class, 'id');
    }
}
