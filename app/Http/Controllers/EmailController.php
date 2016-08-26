<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Log;
use App\Http\Requests;

class EmailController extends Controller
{
    public function store(Request $request)
    {

    	// Receive the email information from Mailgun
    	// grab the important stuff
    	// Forward the email to sms via twillo.
    	// 
    	//   'From' => 'Sender Name <sender@email.com>',
  		//   'Subject' => 'test',
  		//   'To' => 'you@email2.com',
  		//   'body-plain' => 'Body of the email'
  		
  		$from = $request['From'];
    	$to = $request['To'];
    	$subject = $request['Subject'];
    	// $body = $request['body-plain'];

        $body = 'This is a test message! Hooray!! Kind regards Dan';

    	// Twillo API Settings
    	
    	$accountId = env('TWILIO_SID');
        $token = env('TWILIO_TOKEN');
        $fromNumber = env('TWILIO_FROM');

        // Generate Message
        // In my case I needed the message to send without
        // the signature that the server attaches.
        // Anything after 'Kind' is removed. 
    
        $sendmessage = substr($body, 0, strrpos($body, 'Kind'));
        
        $sendmessage = 'ALERT: ' . $sendmessage;

        // Send the message to mobile

        $twilio = new \Aloha\Twilio\Twilio($accountId, $token, $fromNumber);

        $twilio->message(env('MOBILE'), $message);

    	// Log::info($request['to']);
    	// Log::info($request['body-plain']);
    }

}