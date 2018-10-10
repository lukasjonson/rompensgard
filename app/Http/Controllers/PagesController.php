<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;

class PagesController extends Controller
{
    public function index(){

        $title = 'Välkommen';
        return view('pages.index')->with('title', $title);
    }

    public function yoga(){
        return view('pages.yoga');
    }

    public function webshop(){
        return view('pages.webshop');
    }

    public function contact(){
        return view('pages.contact');
    }

    public function test(){
        return view('pages.testish');
    }


    public function postContact(Request $request) {
		$this->validate($request, [
            'subject' => 'min:3',
            'name' => 'min:3',
            'email' => 'required|email',
			'message' => 'min:10']);
        
		$data = array(
			'subject' => strtolower($request->subject),
			'name' => $request->name,
            'email' => $request->email,
            'bodyMessage' => $request->message
            );
            
        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->to('kontakt@rompensgard.se')->subject($data['subject']);
            $message->from($data['email']);
        });

        Mail::send('emails.confirmation', $data, function($message) use ($data) {
            $message->to($data['email'])->subject('Automatisk bekräftelse');
            $message->from('kontakt@rompensgard.se');
        });

		return redirect('/kontakt');
	}

}