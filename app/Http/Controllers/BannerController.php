<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\BannerModel;
use Carbon\Carbon;
use DB;
class BannerController extends Controller
{

    public function index(){
        $banner = DB::select("SELECT tb.id,tb.banner,us.name,date_format(tb.created_at,'%d-%M-%Y, %h:%i:%s %p') as created_at,date_format(tb.updated_at,'%d-%M-%Y, %h:%i:%s %p') as updated_at FROM tbl_banner tb 
INNER JOIN tbl_users us on tb.user_id = us.id");
        return view('back-end.banner',compact('banner'));
    }

    public function insert(request $request){
		$this->validate($request, [
			'images' => 'required',
		]);
        $banner = new BannerModel;
        $banner->user_id = auth::user()->id;
        if($request->hasFile('images')) {
            $file = $request->images;
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $banner->banner = $name;
            $file->move(public_path('/'), $name);
        }
        $banner->save();
        return back()->with('success','Data Insert Successfuly.');
    }

}
