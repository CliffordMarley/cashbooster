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
                $url = "http://207.154.221.168/api/makeDepositRequest";
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
}
