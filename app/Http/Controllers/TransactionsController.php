<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SMSController;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deposit(Request $request)
    {
        try {
            $msisdn = $request->msisdn;
            $amount = $request->amount;
            $wallet = $request->wallet;

            $paymentRequest = PaymentController::initiatePayment($msisdn, $amount, $wallet);
            if ($paymentRequest != 'error') {
                $url = "https://coral-app-zw6g4.ondigitalocean.app/api/makeDepositRequest";
                $response = Http::acceptJson()->timeout(30)->post($url, $paymentRequest);

                return response()->json([
                    'status'=>"success",
                    'message'=>"Transaction is processing...",
                    'data'=>$response
                ]);

            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => $paymentRequest
                ]);
            }

        } catch (\Exception $err) {
            return response()->json([
                'status' => 'error',
                'message' => $err->getMessage()
            ]);
        }
    }
    public function withdrawal(Request $request)
    {
    }

    public function handleCallback(Request $request)
    {
        try {
            $transaction = new Transaction();
            $transaction->txn_reference = $request->merchantReference;
            $transaction->msisdn = $request->customerPhone;
            $transaction->currency = $request->currency;
            $transaction->amount = $request->amount;
            $transaction->status = strtoupper($request->status);
            $transaction->description = $request->description;

            $transaction->save();
            self::formulateTransactionNotification($request->msisdn, $request->amount, $request->status);
            return response()->json([
                'status'=>'success'
            ]);
        } catch (\Exception $err) {
            return response()->json([
                'status'=>'error',
                'message'=>$err->getMessage()
            ]);
        }
    }

    public function formulateTransactionNotification($msisdn,$amount, $status){
        try{

            $message = "";
            if($status == 'success'){
                $message = "Txn Confirmed. Dear customer, you have deposited MK".number_format($amount);
                $message .= " to you CashbBooster account.";
            }else{
                $message = "Sorry, you deposit of MK".number_format($amount);
                $message .= " to you CashBooster account was not successful. Try again.";
            }
            SMSController::sendSMS($msisdn, $message);
            return true;
        }catch(\Exception $err){
            return false;
        }
    }
}
