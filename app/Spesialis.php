<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class spesialis extends Model
{
    protected $table = 'spesialis';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    public function dokter()
    {
        return $this->hasMany(Dokter::class, 'spesialis_id');
    }
}
