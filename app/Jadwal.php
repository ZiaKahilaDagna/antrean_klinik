<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id';
    protected $fillable = ['dokter_id', 'hari', 'jam_mulai', 'jam_selesai'];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }
    
    public function antrian()
    {
        return $this->hasMany(Antrian::class, 'jadwal_id');
    }
}
