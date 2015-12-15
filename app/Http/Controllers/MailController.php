<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
	public function mail()
	{
		return view('mail');
	}
	
	public static function sendmail()
	{	
			
        Mail::send('mail', ['msg' => 'hello'], function ($message) {
            $message->from('charu917@gmail.com', 'charu');

            $message->to('charu917@gmail.com', 'charu')->subject('My Test Email!');
        });

        var_dump('sent');
				
			
	}
}
	
?>	