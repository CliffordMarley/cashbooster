<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{

    // protected function __construct(){
    //     return $this->middleware('auth');
    // }
    public function index(Request $request)
    {
        $admins = Administrator::all();

        return view('pages.admins.list')->with([
            'title' => 'System Admin',
            'page' => 'List',
            'admins' => $admins,
            'userdata' => Auth::user()
        ]);

    }


    public function create()
    {
        return view('pages.admins.create')->with([
            'title' => 'System Admin',
            'page' => 'Create Account',
            'userdata' => Auth::user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try{
            //Validate firstname, lastname, email and phone number
            $this->validate($request, [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:administrators',
                'msisdn' => 'required|string|min:10|max:13:unique:administrators',
            ]);

            //Create new admin
            $admin = new Administrator();
            $admin->firstname = $request->firstname;
            $admin->lastname = $request->lastname;
            $admin->email = $request->email;
            $admin->msisdn = $request->msisdn;

            $clearTextPassword = Str::random(8);

            $admin->password = Hash::make($clearTextPassword);

            $admin->save();

            //Redirect to admins list with success message
            return redirect()->route('admins.index')->withSuccess('Admin account created successfully. Password sent to email!');

        }catch(\Exception $err){
            return redirect()->back()->withError($err->getMessage())->withInput($request->input());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Administrator  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Administrator $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administrator  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrator $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administrator  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrator $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Administrator  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($admin_id)
    {

        //Find or Fail admin with id = $admin_id
        $admin = Administrator::findOrFail($admin_id);
        //Delete administrator if not the current user
        if($admin->id != Auth::user()->id){
            $admin->delete();
            return redirect()->route('admins.index')->withSuccess('Admin account deleted successfully');
        }else{
            return redirect()->route('admins.index')->withError('You cannot delete your own account');
        }
    }
}
