<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'spesialis_id', 'no_hp'];

    public function spesialis()
    {
        return $this->belongsTo(Spesialis::class, 'spesialis_id');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'dokter_id');
    }

    public function antrian()
    {
        return $this->hasMany(Antrian::class, 'dokter_id');
    }
}
