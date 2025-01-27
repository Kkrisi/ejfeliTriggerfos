<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoMail;


class MailController extends Controller
{
    public function index()
    {
        $mailData = [
            'title' => 'Ez a levél címe',
            'body' => 'Ez a levél szövege, amit a blade sablonban fogunk megjeleníteni.'
        ];       


        Mail::to('attilapfiffer@gmail.com')->send(new DemoMail($mailData));
        
        dd("Email küldése sikeres.");

        return 'E-mail elküldve!';
    }

}
