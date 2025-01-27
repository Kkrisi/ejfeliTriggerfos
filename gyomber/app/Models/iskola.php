<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class iskola extends Model
{
    use HasFactory;

    // Az oszlopok, amiket mass assingelhetővé teszünk
    protected $fillable = [
        'nev',
        'web_oldal',
        'kapcsolat_tarto',
    ];

    // Kapcsolatok a külső táblákhoz
    public function dolgozok()
    {
        return $this->hasMany(Dolgozo::class, 'iskola_azon');
    }
}
