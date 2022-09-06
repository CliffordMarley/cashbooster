<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SMSController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resetPin(Request $request)
    {
        try{
            $user = User::first('id', $request->user_id);
            $new_pin = rand(1001, 9999);
            $user->password = Hash::make($new_pin);
            $user->save();

            $message = "Dear customer, your access PIN has been reset to ";
            $message .= $new_pin.". Please change it to your preference.";

            SMSController::sendSMS($user->msisdn,$message);
            return response()->json([
                'status' => 'success',
                'message' => 'Customer Pin has been reset successfully'
            ]);
        }catch(\Exception $err){
            return response()->json([
                'status'=>'error',
                'message'=>$err->getMessage(),
                'error'=>$err
            ]);
        }
    }

}
