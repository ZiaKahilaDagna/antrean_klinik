<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id';
    protected $fillable = ['dokter_id', 'hari', 'jam_mulai', 'jam_selesai'];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id');
    }
}
