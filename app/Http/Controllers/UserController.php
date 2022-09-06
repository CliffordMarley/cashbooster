<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\SMSController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $users = new User();

        //Check is $request->msisdn is provided
        if ($request->has('msisdn')) {
           $users = $users->where('msisdn','=',$request->msisdn)->get();
            if(count($users) > 0){
                return response()->json([
                    'data' => $users[0],
                    'status' => 'success',
                    'message' => 'User retrieved successfully'
                ]);
            }else{
                return response()->json([
                    'error' => 'The provided msisdn did not match any existing users',
                    'status' => 'error',
                    'message' => 'User not found'
                ]);
            }
        }
        //Get All Users

        return response()->json([
            'data' => $users->all(),
            'status' => 'success',
            'message' => 'Users retrieved successfully'
        ]);
    }

    public function resetPin(Request $request)
    {
        try {
            $user = User::first('id', $request->user_id);
            $new_pin = rand(1001, 9999);
            $user->password = Hash::make($new_pin);
            $user->save();

            $message = "Dear customer, your access PIN has been reset to ";
            $message .= $new_pin . ". Please change it to your preference.";

            SMSController::sendSMS($user->msisdn, $message);
            return response()->json([
                'status' => 'success',
                'message' => 'Customer Pin has been reset successfully'
            ]);
        } catch (\Exception $err) {
            return response()->json([
                'status' => 'error',
                'message' => $err->getMessage(),
                'error' => $err
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changePin(Request $request)
    {
        //Check if old_pin is equal to user.password
        $user = User::where('msisdn', $request->msisdn)->first();
        if(Hash::check($request->old_pin, $user->password)){
            //Check if new_pin is equal to user.password
            if(Hash::check($request->new_pin, $user->password)){
                return response()->json([
                    'error' => 'The new pin cannot be the same as the old pin',
                    'status' => 'error',
                    'message' => 'Pin not changed'
                ]);
            }else{
                //Change user.password to new_pin
                $user->password = Hash::make($request->new_pin);
                $user->save();
                return response()->json([
                    'data' => $user,
                    'status' => 'success',
                    'message' => 'You Pin has been updated successfully'
                ]);
            }
        }else{
            return response()->json([
                'error' => 'The old pin is incorrect. Please try again!',
                'status' => 'error',
                'message' => 'The old pin is incorrect. Please try again!'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //Create user in try block and return error in catch block
         try {
            $user = new User();

            //Check if user already exist
            $checkUser = User::where('msisdn','=',$request->msisdn)->get();
            if(count($checkUser) > 0){
                return response()->json([
                    'error' => 'The provided msisdn already exist',
                    'status' => 'error',
                    'message' => 'User already exist'
                ]);
            }

            $user->msisdn = $request->msisdn;
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->alias = $request->allias;

            //Create and preserve a clear text password to send to the user
            $clearTextPassword = rand(1001,9999);

            //Hash the clear Text password before saving
            $user->password = Hash::make($clearTextPassword);

            //Save new user
            $user->save();

            $message = "Dear ".ucfirst($request->firstname);
            $message .= ", Your CashBooster account is active. Your PIN number is ".$clearTextPassword;
            $message .= ". Keep it save!";
            SMSController::sendSMS('+'.$user->msisdn, $message);

            return response()->json([
                'data' => ['clearTextPin'=>$clearTextPassword],
                'status' => 'success',
                'message' => 'User created successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'status' => 'error',
                'message' => 'User creation failed'
            ]);
        }
    }

    function getAllPlayers(){
        return view('pages.players.list')->with([
            'players' => User::all(),
            'title' => 'Players',
            'page'=>'List',
            'userdata'=>Auth::user()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //Search user by $request->msisdn in try block and return error in not found
        try {
            //$user = User::where('msisdn', $request->msisdn)->first();
            return $user;
            if($user == null){
                return response()->json([
                    'error' => 'The provided msisdn did not match any existing users',
                    'status' => 'error',
                    'message' => 'User not found'
                ]);
            }
            return response()->json([
                'data' => $user,
                'status' => 'success',
                'message' => 'User retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'status' => 'error',
                'message' => 'User not found'
            ]);
        }
    }


    public function close(Request $request)
    {
        //
        return [
            'status'=>'success',
            'message'=>'Your account with msisdn of '.$request->msisdn.' has been closed successfully!'
        ];
    }


    public function getBalance(Request $request)
    {
        //Calculate Balance from sum of all amounts in Transaction with msisdn = $request->msisdn and user authenticated with $request->pin = $user->password
        $user = User::where('msisdn', $request->msisdn)->first();
        if(Hash::check($request->pin, $user->password)){
            $transactions = Transaction::where('msisdn', $request->msisdn)->get();
            $balance = 0;
            foreach($transactions as $transaction){
                $balance += $transaction->amount;
            }
            return response()->json([
                'data' => ['balance'=>$balance],
                'status' => 'success',
                'message' => 'Balance retrieved successfully'
            ]);
        }else{
            return response()->json([
                'error' => 'wrong_pin',
                'status' => 'error',
                'message' => 'The provided pin is incorrect. Please try again!'
            ]);
        }

    }

    public function destroy(User $user)
    {
        //
    }
}
