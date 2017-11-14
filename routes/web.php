<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::GET('page/{name}', ['as'=>'menu.show','uses'=>'FronEndController@index']);
Route::GET('/', ['as'=>'menu.shows','uses'=>'FronEndController@show']);
//404
Route::GET('pagenotfound', ['as'=>'notfound','uses'=>'FronEndController@notfound']);



Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::group(['prefix' => 'admin','middleware' => ['auth']], function() {

	Route::GET('dashboard',['as'=>'dashboard.index','uses'=>'HomeController@index']);
	Route::GET('dashboard/profile',['as'=>'dashboard.profile','uses'=>'HomeController@profile']);
	Route::POST('dashboard/profile/edit',['as'=>'dashboard.editprofile','uses'=>'HomeController@editprofile']);

	Route::POST('dashboard/updatepassword',['as'=>'dashboard.passwordchage','uses'=>'HomeController@postProfilePassword']);
	
	
	/*home*/
	Route::GET('home',['as'=>'homebackend.index','uses'=>'HomebackendController@index','middleware' => ['permission:post-list']]);
	Route::POST('home/logo/{id}',['as'=>'homebackend.logo','uses'=>'HomebackendController@logo','middleware' => ['permission:post-list']]);
	Route::POST('home/welcome/{id}',['as'=>'homebackend.welcome','uses'=>'HomebackendController@welcome','middleware' => ['permission:post-list']]);
	Route::POST('home/general/{id}',['as'=>'homebackend.general','uses'=>'HomebackendController@general','middleware' => ['permission:post-list']]);
	Route::POST('home/weare/{id}',['as'=>'homebackend.weare','uses'=>'HomebackendController@weare','middleware' => ['permission:post-list']]);
	
	/* role and set permission*/
	Route::GET('role',['as'=>'role.index','uses'=>'RoleController@index','middleware' => ['permission:role-list']]);
	Route::GET('role/create',['as'=>'role.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
	Route::POST('role/store',['as'=>'role.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
	Route::GET('role/edit/{id}',['as'=>'role.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
	Route::POST('role/update/{id}',['as'=>'role.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
	Route::GET('role/delete/{id}',['as'=>'role.delete','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);
	
	
	/*users*/
	Route::GET('user',['as'=>'user.index','uses'=>'UserController@index','middleware' => ['permission:user-list']]);
	Route::GET('user/create',['as'=>'user.create','uses'=>'UserController@create','middleware' => ['permission:user-create']]);
	Route::POST('user/store',['as'=>'user.store','uses'=>'UserController@store','middleware' => ['permission:user-delete']]);

	
	/*menu*/
	Route::GET('menu', ['as'=>'menu.index','uses'=>'MenuController@index','middleware' => ['permission:menu-list']]);
	Route::POST('menu/insert', ['as'=>'menu.insert','uses'=>'MenuController@insert','middleware' => ['permission:menu-create']]);
	Route::POST('menu/edit/{id}', ['as'=>'menu.edit','uses'=>'MenuController@edit','middleware' => ['permission:menu-edit']]);
	Route::GET('menu/delete/{id}',['as'=>'menu.delete','uses'=>'MenuController@delete','middleware' => ['permission:menu-delete']]);
	
	
	/*heroes banner*/
	Route::GET('banner',['as'=>'banner.index','uses'=>'BannerController@index','middleware' => ['permission:slide-list']]);
	Route::POST('banner/insert',['as'=>'banner.insert','uses'=>'BannerController@insert','middleware' => ['permission:slide-create']]);
	
	
	/*post*/
	Route::GET('post',['as'=>'post.index','uses'=>'PostController@index','middleware' => ['permission:post-list']]);
	Route::POST('post/insert',['as'=>'post.insert','uses'=>'PostController@insert','middleware' => ['permission:post-create']]);
	Route::GET('post/getpostupdate',['as'=>'post.getupdate','uses'=>'PostController@getAjaxupdate','middleware' => ['permission:post-create']]);
	Route::POST('post/update',['as'=>'post.update','uses'=>'PostController@update','middleware' => ['permission:post-create']]);
	
	
	/*team*/
	Route::GET('team',['as'=>'team.index','uses'=>'TeamController@index','middleware' => ['permission:team-list']]);
	Route::POST('team/insert',['as'=>'team.insert','uses'=>'TeamController@insert','middleware' => ['permission:team-create']]);
	
	
	

});
