<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;


Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';


Route::get('/send-mail', [MailController::class, 'index']);







// composer require laravel/sanctum
// composer require laravel/breeze --dev
// php artisan breeze:install api