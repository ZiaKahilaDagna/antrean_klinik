<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasiean';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'address', 'email', 'no_hp', 'jenis_kelamin'];

    public function pasien()
    {
        return $this->hasMany(Pasien::class, 'id');
    }
}
