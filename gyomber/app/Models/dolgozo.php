<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dolgozo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nev',
        'email',
        'szul_nev',
        'születesi_hely',
        'születesi_ido',
        'anyaja_neve',
        'taj_szam',
        'ado_szam',
        'gondviselo_nev',
        'telefonszam',
        'megjegyzes',
        'iskola_azon',
        'csoport_azon',
        'gyakhely_azon',
    ];



    // Kapcsolatok a külső táblákhoz
    public function iskola()
    {
        return $this->belongsTo(Iskola::class, 'iskola_azon');
    }

    public function csoport()
    {
        return $this->belongsTo(Csoport::class, 'csoport_azon');
    }

    public function gyakhely()
    {
        return $this->belongsTo(Gyakorlatihely::class, 'gyakhely_azon');
    }
}
