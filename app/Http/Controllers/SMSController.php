<?php

namespace App\Http\Controllers;
use AfricasTalking\SDK\AfricasTalking;
use Illuminate\Http\Request;

class SMSController extends Controller
{
    public static function sendSMS($msisdn, $message)
    {
        $username = 'MAZIKOFINTECHLTD'; // use 'sandbox' for development in the test environment
        $apiKey   = 'bf9fff7a16aacf05be41f01db12187a5eeb7cf6af49b92a371563fe46e03392a'; // use your sandbox app API key for development in the test environment
        $senderId = 'CashBooster';
        $AT       = new AfricasTalking($username, $apiKey);

        $sms      = $AT->sms();

        try {
            $result   = $sms->send([
                'to'      => $msisdn,
                'message' => $message,
                'from'    => $senderId
            ]);
            /*$sms = new SMSMessage();
            $sms->msisdn = $msisdn;
            $sms->contents = $message;
            $sms->save();*/

            return $result;
        } catch (\Exception $e) {
            return $e;
        }
    }
}
