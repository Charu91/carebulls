<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
	public function mail1()
	{
		return view('mail1');
	}
	
	public static function sendmail()
	{	
		Mail::send('welcome1', ['key' => 'value'], function($message)
		{
			$message->to('charu@devzila.com', 'Charu')->subject('Welcome to Carebulls!');
		});
			echo "mail sent sucessfully";
	}
	
}
?>	