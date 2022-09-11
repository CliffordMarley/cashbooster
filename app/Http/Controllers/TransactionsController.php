<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SMSController;
use Ramsey\Uuid\Uuid;

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

                if (env('APP_ENV') == 'localhost') {
                    $url = 'http://localhost:9000/api/makeDepositRequest';
                }
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

    public static function debitStakeFromAccount($msisdn, $amount)
    {
        try {
            $reference = Uuid::uuid4();

            $transaction = new Transaction();

            $transaction->txn_reference = $reference;
            $transaction->msisdn = $msisdn;
            $transaction->amount = ($amount * -1);
            $transaction->currency = 'MWK';
            $transaction->status = 'SUCCESS';
            $transaction->description = 'Stake deduction';

            $transaction2 = new Transaction();
            $transaction2->txn_reference = $reference;
            $transaction2->msisdn = User::where('alias', '=', 'Collection')->first()->msisdn;
            $transaction2->amount = $amount;
            $transaction2->currency = 'MWK';
            $transaction2->status = 'SUCCESS';
            $transaction2->description = 'Stake Collection';

            $transaction->save();
            $transaction2->save();

            return 'OK';
        } catch (\Exception $err) {
            return $err->getMessage();
        }
    }
    public static function creditPlayerWinnings($msisdn, $amount)
    {
        try {
            $reference = Uuid::uuid4();

            $transaction = new Transaction();

            $transaction->txn_reference = $reference;
            $transaction->msisdn = $msisdn;
            $transaction->amount = $amount;
            $transaction->currency = 'MWK';
            $transaction->status = 'SUCCESS';
            $transaction->description = 'Winner Credit';

            $transaction2 = new Transaction();
            $transaction2->$reference;
            $transaction2->msisdn = User::where('alias', '=', 'Collection')->first()->msisdn;
            $transaction2->amount = ($amount * -1);
            $transaction2->currency = 'MWK';
            $transaction2->status = 'SUCCESS';
            $transaction2->description = 'Winnings Distribution';

            $transaction->save();
            $transaction2->save();

            return 'OK';
        } catch (\Exception $err) {
            return $err;
        }
    }
}
