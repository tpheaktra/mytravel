<?php

namespace App\Http\Controllers;
use App\TeamModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\HomebackendModel;
class FronEndController extends Controller
{

    public function index($name=''){
         $getdata = DB::select("SELECT tp.id,us.name,tm.name as menu,tp.title,tp.images,tp.description,date_format(tp.created_at,'%d-%M-%Y, %h:%i:%s %p') as created_at,date_format(tp.updated_at,'%d-%M-%Y, %h:%i:%s %p') as updated_at FROM tbl_post tp 
INNER JOIN tbl_users us on tp.user_id = us.id
INNER JOIN tbl_menu tm on tp.menu_id = tm.id WHERE tm.name='$name' ORDER by tp.id desc");


        if($name == 'home'){
			$home    = HomebackendModel::all();
            $ourteam = TeamModel::all();
            return view('front-end.index',compact('ourteam','home'));
        }elseif($name == 'tours'){
            return view('front-end.tours',compact('getdata'));
        }elseif($name == 'gallery'){
            return view('front-end.gallary',compact('getdata'));
        }elseif($name == 'contact-us'){
            return view('front-end.contact_us');
        }
        else{  
             return view('front-end.post',compact('getdata','name'));
        }
    }

    public function show(){
		 $home    = HomebackendModel::all();
         $ourteam = TeamModel::all();
         return view('front-end.index',compact('ourteam','home'));
    }
	
	
	
	public function notfound(){
		return view('errors.404');
	}

}
