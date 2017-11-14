<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuModel;
use Carbon\Carbon;
use auth;
use DB;
class MenuController extends Controller
{



    public function index(){
    	$menu = DB::select("SELECT tm.id,us.name as author, tm.name,tm.slug,DATE_FORMAT(tm.created_at, '%d-%M-%Y, %h:%i:%s %p')as created_at ,DATE_FORMAT(tm.updated_at, '%d-%M-%Y, %h:%i:%s %p')as updated_at FROM tbl_menu tm
INNER JOIN tbl_users us on tm.user_id = us.id");

    	return view('back-end.menu',compact('menu'));
    }

    public function insert(request $request){
		$this->validate($request, [
				'menu' => 'required',
		]);
    	$menu = new MenuModel;
    	$menu->name    = $request->menu;
    	$menu->user_id = auth::user()->id;
    	$menu->slug    = str_replace(' ', '-', strtolower($request->menu));
    	$menu->save();
    	return back()->with('success','Data Insert Successfuly.');
    }


    public function delete($id){
		MenuModel::findOrFail($id)->delete();
		return back()->with('success','Data delete Successfuly.');
    }


    public function edit(request $request,$id){
    	$menu = MenuModel::findOrFail($id);
    	$menu->name  = $request->menu;
    	$menu->user_id = auth::user()->id;
    	$menu->slug  = str_replace(' ', '-', strtolower($request->menu));
    	$menu->updated_at = Carbon::now();
    	$menu->save();
    	return back()->with('success','Data Update Successfuly.');
    }

}
