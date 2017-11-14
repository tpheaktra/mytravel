<?php

use Illuminate\Database\Seeder;

class HomeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_home')->insert([
            'user_id' => 1,
            'logo' => '2017-10-17-07-29-54-logo.png',
            'favaion' => '',
            'description' => 'Angkor is a place to be savoured, not rushed, and this is the base from which to plan your adventures. Still think three days at the temples is enough? Think again with Siem Reap on the doorstep.',
            'phone' => '093 322 910',
            'email' => 'kolapheaktra@gmail.com',
            'working' => 'working Day 8:00AM-12:00PM and 1:00PM-5:00PM',
            'address' => 'Siem Reap, Siem Reap Province, Cambodia',
            'welcome' => 'was always des',
            'information' => 'tfrg',
            'we_are' =>'test'
        ]);

    }
}
