<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use auth;
use DB;
use Hash;
use Illuminate\Support\Facades\Input;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function profile(){
        return view('back-end.profile');
    }


    public function editprofile(request $request){
        $id = auth::user()->id;
        $user = User::findOrFail($id);
        $user->name = $request->name;
        if($request->hasFile('images')) {
            $file = $request->images;
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $user->profile = $name;
            $file->move(public_path('/'), $name);
        }
        $user->save();
        return back()->with('success','Your profile has been updated successfuly');
    }


    public function postProfilePassword(Request $request) {

        $this->validate($request, [
            'old_password'     => 'required',
            'new_password'     => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);
       // $data = $request->all();
     
        $user = User::find(auth()->user()->id);
       // echo $user->password;exit();
        if(!Hash::check($request->old_password, $user->password)){
             return back()->with('danger','The specified password does not match the database password');
        }else{
             // write code to update password
               $id = auth::user()->id;
               $input = $request->all();       
               $input['password'] = Hash::make($input['new_password']);

               $user = User::find($id);
               $user->update($input);
               return back()->with('success','The Password has been update successfuly');
        }

    }
    
}
