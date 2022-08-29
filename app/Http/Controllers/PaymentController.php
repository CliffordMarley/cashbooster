<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;


class PaymentController extends Controller
{
   public static function initiatePayment($customerPhone,$amount,$walletProvider){
        try{
            $merchantRef =  Uuid::uuid4()->toString();
            $customerPhone = "0".substr($customerPhone, 3, (strlen($customerPhone) - 1));
            $txnPayload = [
                "merchantId"=>3514,
                "paymentOptionId"=>$walletProvider,
                "customerPhone"=>$customerPhone,
                "currency"=>"MWK",
                "amount"=>$amount,
                "merchantReference"=>$merchantRef
            ];

            // print_r($txnPayload);

            return $txnPayload;
        }catch(\Exception $err){
            return "error";
        }
   }
}
