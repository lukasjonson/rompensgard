<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function send(){

        Mail::raw('This is an test e-mail', function ($message) {
            $message->to("kontakt@rompensgard.se", "someone");
            $message->subject("hi checking");
            $message->getSwiftMessage();
        });
        
    }
}
