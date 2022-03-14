<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
class WhatsappController extends Controller
{
    //
    public function store(Request $request){

        $sid    = "AC915d68e23a599eb453fdeba5053e0679";
        $token  = "bc0160c1407f4090fb41c0f1f620e890";
        $twilio = new Client($sid, $token);
        $message = $twilio->messages
                  ->create("whatsapp:+919864011839", // to
                          [
                               "from" => "whatsapp:+14155238886",
                               "body" => $request->title,
                               "mediaUrl" => [$request->url],
                               "MessagingServiceSid" => "MGf1a287abbbf8093c1caf2ba871b1fe02",

                          ]

                  );
        return response()->json(['message' => $message]);
    }
}
