<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


# http://localhost:8000/sanctum/csrf-cookie
# http://localhost:8000/login


// bárki által elérhető
#Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [UserController::class, 'store']);



// autentikált felhasználó
Route::middleware(['auth:sanctum'])
    ->group(function () {

        // Az aktuális felhasználó adatainak lekérdezése (ez a sima bejelentkezésnél kell!)
        Route::get('/user', function (Request $request) {
            return $request->user();
        });

        # A bejelentkezett felhasználó lekérdezheti a hozzá kapcsolódó kiküldött emailek adatait.
        Route::get('/user-sent-emails', [UserController::class, 'getSentEmailsByUser']);
        # jelszo megváltoztatás
        Route::put('/user/password', [UserController::class, 'changePassword']);

    


        
        
        // Kijelentkezés útvonal
        #Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
    });



// admin réteg
Route::middleware(['auth:sanctum', Admin::class])
    ->group(function () {
        // Route::get('/admin/users', [UserController::class, 'index']);
        // összes kérés egy útvonalon
        Route::apiResource('/admin/users', UserController::class);
        Route::patch('update-password/{id}', [UserController::class, 'updatePassword']);
        #A bejelentkezett felhasználó lekérdezheti a hozzá kapcsolódó kiküldött emailek adatait.
        Route::get('/my-sent-emails', [EmailController::class, 'userSentEmails']);

        Route::get('/user/roles', [UserController::class, 'getUserRoles']);
        Route::put('/user/roles', [UserController::class, 'updateUserRoles']);
    });



// karbantartó réteg
Route::middleware(['auth:sanctum', Librarian::class])
    ->group(function () {
        Route::post('/store-lending', [LendingController::class, 'store']);
    });