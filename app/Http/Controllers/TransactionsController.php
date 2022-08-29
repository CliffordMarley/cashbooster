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
                $url = "https://cashbooster.malipo.dev/api/makeDepositRequest";
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
}
