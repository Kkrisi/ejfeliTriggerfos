<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kikuldott extends Model
{
    use HasFactory;

    // Az oszlopok, amiket mass assingelhetővé teszünk
    protected $fillable = [
        'kikuldes_azon',
        'penzugy_azon',
        'email',
        'pdf_fajl_neve',
        'kuldes_datuma',
    ];

    // Kapcsolatok a külső táblákhoz
    public function kikuldes()
    {
        return $this->belongsTo(Kikuldes::class, 'kikuldes_azon');
    }

    public function penzugy()
    {
        return $this->belongsTo(Penzugy::class, 'penzugy_azon');
    }
}
