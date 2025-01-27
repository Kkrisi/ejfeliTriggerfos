<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jogosultsag extends Model
{

    protected $primaryKey = 'jog_azon';

    protected $fillable = ['megnevezes'];



    // Kapcsolatok
    public function felhasznalok()
    {
        return $this->hasMany(felhasznalo::class, 'jogosultsag_azon', 'jog_azon');
    }
}
