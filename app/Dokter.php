<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'spesialis_id', 'no_hp'];

    public function dokter()
    {
        return $this->hasMany(Dokter::class, 'id');
    }
}
