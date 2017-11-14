<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomebackendModel;
use auth;
use Carbon\Carbon;
class HomebackendController extends Controller
{
    public function index(){
		$home = HomebackendModel::all();
		return view('back-end.home',compact('home'));
	}
	/* update logo and address */
	public function logo(request $request,$id){
		 	$home =  HomebackendModel::findOrFail($id);
			$home->user_id      = auth::user()->id;
			$home->phone        = $request->phone;
			$home->email        = $request->email;
			$home->working      = $request->workingday;
			$home->address      = $request->address;
			$home->description  = $request->description;

			if($request->hasFile('images')) {
				$file         = $request->images;
				$timestamp    = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
				$name         = $timestamp. '-' .$file->getClientOriginalName();
				$home->logo   = $name;
				$file->move(public_path('/'), $name);
			}

			$home->save();
			return back()->with('success','Data has been successfuly');
	}
	/* update welcome message */
	public function welcome(request $request,$id){
			$home =  HomebackendModel::findOrFail($id);
			$home->user_id       = auth::user()->id;
			$home->welcome       = $request->welcomes;
			$home->save();
			return back()->with('success','Data has been update successfuly');
	}
	/* update general information */
	public function general(request $request,$id){
			$home =  HomebackendModel::findOrFail($id);
			$home->user_id       = auth::user()->id;
			$home->information   = $request->generals;
			$home->save();
			return back()->with('success','Data has been update successfuly');
	}
	/* update we are a travel agency */
	public function weare(request $request,$id){
			$home =  HomebackendModel::findOrFail($id);
			$home->user_id       = auth::user()->id;
			$home->we_are        = $request->wearetravel;
			$home->save();
			return back()->with('success','Data has been update successfuly');
	}
}
