<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = [
            [
                'name' => 'Home',
                'user_id' => '1',
                'slug' => 'home',
            ],
            [
                'name' => 'Tours',
                'user_id' => '1',
                'slug' => 'tours',
            ],
            [
                'name' => 'Gallery',
                'user_id' => '1',
                'slug' => 'gallery',
            ],
            [
                'name' => 'Services',
                'user_id' => '1',
                'slug' => 'services',
            ],
            [
                'name' => 'Contact Us',
                'user_id' => '1',
                'slug' => 'contact-us',
            ],
        ];
        DB::table('tbl_menu')->insert($menu);
    }
}
