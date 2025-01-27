<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;


class UserController extends Controller
{


    use HasApiTokens, HasFactory, Notifiable;

    public function store(Request $request)
    {
        // Validáció
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Bejelentkezési kísérlet
        if (Auth::attempt($request->only('email', 'password'))) {
            // Token generálása (ha Sanctumot használsz)
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Sikeres bejelentkezés!',
                'token' => $token,
                'user' => $user,
            ], 200);
        }

        // Sikertelen bejelentkezés
        return response()->json([
            'message' => 'Hibás bejelentkezési adatok!',
        ], 401);
    }




    public function getSentEmailsByUser() {
        $user = Auth::user();

        $emails = DB::table('kikuldott')
            ->join('elokeszites', 'kikuldott.penzugy_azon', '=', 'elokeszites.penzugy_azon')
            ->where('elokeszites.dolgozo_azon', $user->d_azon)
            ->select('kikuldott.email', 'kikuldott.pdf_fajl_neve', 'kikuldott.kuldes_datuma')
            ->orderBy('kikuldott.kuldes_datuma', 'desc')
            ->get();

        return response()->json($emails);
    }
}
