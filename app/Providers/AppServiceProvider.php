<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\MenuModel;
use App\BannerModel;
use auth;
use App\HomebackendModel;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    

    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer(['layouts.front-end'], function($view){
           $getmenu = MenuModel::all();
           $getbanner = BannerModel::all();
		   $home   = HomebackendModel::all();
           $view->with(compact('getmenu','getbanner','home')); 
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
        
}
