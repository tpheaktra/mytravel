<?php

use Illuminate\Database\Seeder;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banner = [
            [
                'banner' => '2017-10-12-03-20-22-VATR_Header_Banner_1920x700.jpg',
                'user_id' => '1',
            ],
            [
                'banner' => '2017-10-12-03-28-45-normal_banner1.jpg',
                'user_id' => '1',
            ],
            [
                'banner' => '2017-10-12-03-49-21-VATR_Header_Banner_1920x700.jpg',
                'user_id' => '1',
            ],
        ];
        DB::table('tbl_banner')->insert($banner);
    }
}
