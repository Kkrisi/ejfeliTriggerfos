<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gyakorlatihely extends Model
{
    use HasFactory;

    protected $fillable = [
        'ceg_nev',
        'web_oldal',
        'kapcsolat_tarto',
        'telefonszam',
    ];



    // Kapcsolatok a külső táblákhoz
    public function dolgozok()
    {
        return $this->hasMany(dolgozo::class, 'gyakhely_azon');
    }
}
