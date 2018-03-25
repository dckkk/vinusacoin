<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class EmailController extends Controller {
    public function send(Request $request){
	    //Logic will go here
     	$data = Input::all();
        Mail::send('emails.send', $data, function($message) use ($data){
        	 $message
        	 ->to(getenv('EMAIL_ADMIN'))
        	 ->replyTo($data['email_address'], $data['name'])
        	 ->subject("pesan dari : ".$data['name']." (".$data['email_address'].")");
        });

        return Redirect::route('contact')->with('message', 'Your message has been sent. Thank You!');
	}
}
