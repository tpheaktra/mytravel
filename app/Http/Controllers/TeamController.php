<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeamModel;
use auth;
use Carbon\Carbon;
use DB;
class TeamController extends Controller
{
    public function index(){
    	$team = DB::select("SELECT tou.id,tou.name,tou.position,tou.images,tou.description,us.name as author,date_format(tou.created_at,'%d-%M-%Y, %h:%i:%s %p') as created_at,date_format(tou.updated_at,'%d-%M-%Y, %h:%i:%s %p') as updated_at FROM tbl_our_team tou
INNER JOIN tbl_users us on tou.user_id = us.id");

    	return view('back-end.team',compact('team'));
    }

    public function insert(request $request){
        $this->validate($request, [
			'name' => 'required',
			'position' => 'required',
			'description' => 'required',
			'images' => 'required',
		]);
        $team = new TeamModel;
        $team->user_id       = auth::user()->id;
        $team->name          = $request->name;
        $team->position      = $request->position;
        $team->description   = $request->description;

        if($request->hasFile('images')) {
            $file         = $request->images;
            $timestamp    = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name         = $timestamp. '-' .$file->getClientOriginalName();
            $team->images = $name;
            $file->move(public_path('/'), $name);
        }

        $team->save();
        return back()->with('success','Data insert successfuly');
    }

}
