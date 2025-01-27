<?php

namespace App\Observers;

use App\Models\Dolgozo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;



class DolgozoObserver
{
    public function creating(Dolgozo $dolgozo)
    {
        // Ellenőrzés, hogy az email és a TAJ szám érvényesek
        $validator = Validator::make($dolgozo->getAttributes(), [
            'email' => 'required|email|unique:dolgozo,email',
            'taj_szam' => [
                'required',
                'unique:dolgozo,taj_szam',
                'regex:/^[1-8]{1}[0-9]{8}$/', // Regex a TAJ szám formátum ellenőrzésére
            ],
        ]);

        if ($validator->fails()) {
            // Ha a validálás nem sikerül, hibát dobunk
            throw new ValidationException($validator);
        }
    }

    public function created(Dolgozo $dolgozo)
    {
        // A dolgozó sikeres létrehozása után esetleg valamilyen logika
    }

    // Törlés, frissítés eseményeit is hozzáadhatod
}
