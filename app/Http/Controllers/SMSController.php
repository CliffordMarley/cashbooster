<?php

namespace App\Http\Controllers;
use AfricasTalking\SDK\AfricasTalking;
use Illuminate\Http\Request;

class SMSController extends Controller
{
    public static function sendSMS($msisdn,$message){
        $username = 'MAZIKOFINTECHLTD'; // use 'sandbox' for development in the test environment
        $apiKey   = 'b7b32d1e3404e7d4e64f0a90ebb3d366eb8bfc033e75adc79e033cbc606da883'; // use your sandbox app API key for development in the test environment
        $AT       = new AfricasTalking($username, $apiKey);

        $sms      = $AT->sms();

        $result   = $sms->send([
            'to'      => $msisdn,
            'from'   => 'CashBooster',
            'message' => $message
        ]);
    }
}
