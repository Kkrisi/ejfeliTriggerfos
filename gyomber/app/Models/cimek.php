<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cimek extends Model
{
    use HasFactory;

    // Az oszlopok, amiket mass assingelhetővé teszünk
    protected $fillable = [
        'd_azon',
        'ir_szam_alando',
        'telepules_allando',
        'utca_allando',
        'hazszam_allando',
        'ir_szam_id',
        'telepules_id',
        'utca_id',
        'hazszam_id',
    ];


    
    // Kapcsolatok a külső táblákhoz
    public function dolgozo()
    {
        return $this->belongsTo(Dolgozo::class, 'd_azon');
    }
}
