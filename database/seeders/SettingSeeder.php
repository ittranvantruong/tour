<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('settings')->insert([
            'key' => 'site_name',
            'plain_value' => 'Travel',
        ]);
        DB::table('settings')->insert([
            'key' => 'site_logo',
            'plain_value' => 'public/images/logomevivumoi.png',
            'type_input' => 3
        ]);
        DB::table('settings')->insert([
            'key' => 'site_image_header',
            'plain_value' => 'public/images/top_banner.jpeg',
            'type_input' => 3
        ]);
        DB::table('settings')->insert([
            'key' => 'site_hotline',
            'plain_value' => '0379266997'
        ]);
        DB::table('settings')->insert([
            'key' => 'site_tel',
            'plain_value' => '0379266997'
        ]);
        DB::table('settings')->insert([
            'key' => 'site_address',
            'plain_value' => '998/42/15 Quang Trung'
        ]);
        DB::table('settings')->insert([
            'key' => 'site_email',
            'plain_value' => 'contact@gmail.com'
        ]);
        DB::table('settings')->insert([
            'key' => 'site_facebook',
            'plain_value' => '0379266997',
            'type_input' => 1
        ]);
        DB::table('settings')->insert([
            'key' => 'site_google_map',
            'plain_value' => '0379266997',
            'type_input' => 1
        ]);
        DB::table('settings')->insert([
            'key' => 'site_introduce',
            'plain_value' => '',
            'type_input' => 2
        ]);
    }
}
