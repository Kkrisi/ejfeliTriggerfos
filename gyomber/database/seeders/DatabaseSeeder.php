<?php

namespace Database\Seeders;

use App\Models\dolgozo;
use App\Models\felhasznalo;
use App\Models\gyakorlatihely;
use App\Models\iskola;
use App\Models\jogosultsag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        /*

        jogosultsag::create([
            'jog_azon' => 1,
            'megnevezes' => 'user', // Alapértelmezett felhasználói jogosultság
        ]);

        // Először szúrd be a szükséges jogosultságot a jogosultsags táblába
        jogosultsag::create([
            'jog_azon' => 3,
            'megnevezes' => 'superadmin',
        ]);

        
        // Ezután szúrj be felhasználókat
        User::create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('adminpassword'),
            'name' => 'Admin User',
            'jogosultsag_azon' => 3, // Hivatkozás a 'superadmin' jogosultságra
        ]);

        
        User::create([
            'email' => 'user@gmail.com',
            'password' => Hash::make('userpassword'),
            'name' => 'Test User',
            'jogosultsag_azon' => 1, // Ha nem adsz meg jogosultságot, alapértelmezett lesz
        ]);

        */




        iskola::create([
            'nev' => 'Példa Iskola', // A cég neve itt szerepel
            'web_oldal' => 'http://www.peldaiskola.hu',
            'kapcsolat_tarto' => 'Nagy Anna', // Kapcsolattartó neve
        ]);
        
        // Gyakorlatihely adat létrehozása
        gyakorlatihely::create([
            'ceg_nev' => 'Példa Cég', // A cég neve itt szerepel
            'web_oldal' => 'http://www.peldaceg.hu',
            'kapcsolat_tarto' => 'Kiss Péter', // Kapcsolattartó neve
            'telefonszam' => '06201234567', // Telefonszám
        ]);
        

        /*
        // Példa dolgozó létrehozása
        dolgozo::create([
            'nev' => 'Kovács Péter',
            'email' => 'kovacs.peter@example.com',
            'szul_nev' => 'Kovács Anna',
            'születesi_hely' => 'Budapest',
            'születesi_ido' => '1990-01-01',
            'anyaja_neve' => 'Kovács Mária',
            'taj_szam' => '123456789',
            'ado_szam' => '987654321',
            'gondviselo_nev' => 'Kovács István',
            'telefonszam' => '06201234567',
            'megjegyzes' => 'Ez egy példa dolgozó.',
            'iskola_azon' => 1, // Az `iskola` tábla id-ja
            'gyakhely_azon' => 1, // A `gyakorlatihely` tábla id-ja
        ]);  */
    }
}
