<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use auth;
use DB;
use App\MenuModel;
use App\PostModel;
class PostController extends Controller
{

    public function index(){
        $menu = DB::select("SELECT * FROM tbl_menu WHERE id not in ('1','4')");
        $post = DB::select("SELECT tp.id,us.name,tm.name as menu,tp.title,tp.images,tp.description,date_format(tp.created_at,'%d-%M-%Y, %h:%i:%s %p') as created_at,date_format(tp.updated_at,'%d-%M-%Y, %h:%i:%s %p') as updated_at FROM tbl_post tp 
INNER JOIN tbl_users us on tp.user_id = us.id
INNER JOIN tbl_menu tm on tp.menu_id = tm.id ORDER by tp.id desc");

    	return view('back-end.post',compact('menu','post'));
    }

    public function insert(request $request){
        $this->validate($request, [
			'menu' => 'required',
			'title' => 'required',
			'description' => 'required',
			'images' => 'required',
		]);
        $post = new PostModel;
        $post->user_id       = auth::user()->id;
        $post->menu_id       = $request->menu;
        $post->title         = $request->title;
        $post->description   = $request->description;

        if($request->hasFile('images')) {
            $file         = $request->images;
            $timestamp    = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name         = $timestamp. '-' .$file->getClientOriginalName();
            $post->images = $name;
            $file->move(public_path('/'), $name);
        }

        $post->save();
        return back()->with('success','Data insert successfuly');
    }


    /* get ajax for update */
    public function getAjaxupdate(request $request){
        $id = $request->id;
        $query = PostModel::findOrFail($id);
       // $query = DB::select("SELECT * FROM tbl_post WHERE id = 14");
        return $query;
    }


    public function update(request $request){
        $id = $request->id;
        $post = PostModel::findOrFail($id);
        $post->user_id       = auth::user()->id;
        $post->menu_id       = $request->menu;
        $post->title         = $request->title;
        $post->description   = $request->description;

        if($request->hasFile('images')) {
            $file         = $request->images;
            $timestamp    = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name         = $timestamp. '-' .$file->getClientOriginalName();
            $post->images = $name;
            $file->move(public_path('/'), $name);
        }

        $post->save();
        return back()->with('success','Data has been update successfuly');
    }



}
