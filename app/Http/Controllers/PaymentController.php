<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
   public static function initiatePayment($customerPhone,$amount,$walletProvider,$merchantReference){
        try{
            $url = "https://mobipay.cash/prod/merchantController/requestMobilePayment";
            $customerPhone = "0".substr($customerPhone, 3, (strlen($customerPhone) - 1));
            $txnPayload = [
                "merchantId"=>3514,
                "paymentOptionId"=>$walletProvider,
                "customerPhone"=>$customerPhone,
                "currency"=>"MWK",
                "amount"=>$amount,
                "merchantReference"=>$merchantReference
            ];

            // print_r($txnPayload);

            $response = Http::acceptJson()->timeout(30)->post($url,$txnPayload);
            return $response;
        }catch(\Exception $err){
            return "error";
        }
   }
}
