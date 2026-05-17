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

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }
    
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }
    
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id');
    }
}
