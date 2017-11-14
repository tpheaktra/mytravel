<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
		 $this->call(PermissionTableSeeder::class);
         $this->call(HomeTableSeeder::class);
         $this->call(BannerTableSeeder::class);
         $this->call(MenuTableSeeder::class);
    }
}
