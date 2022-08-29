<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\PaymentController;

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
                return response()->json([
                    'status' => 'success',
                    'message' => 'Transaction is processing...',
                    'data' => $paymentRequest
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
