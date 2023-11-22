<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SocialNetworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('social_networks')->insert([
            'name' => 'Instagram',
            'page_url' => 'https://www.instagram.com/exe_g.l',
            'path_img' => 'img/social_networks/logo_ig.png',
            'user_id' => 1, 
        ]);
        DB::table('social_networks')->insert([
            'name' => 'Facebook',
            'page_url' => 'https://facebook.com/exequielandres.gonzalezlopez',
            'path_img' => 'img/social_networks/logo_fb.png',
            'user_id' => 1, 
        ]);
        DB::table('social_networks')->insert([
            'name' => 'GitHub',
            'page_url' => 'https://github.com/ExequielGL',
            'path_img' => 'img/social_networks/logo_github.png',
            'user_id' => 1, 
        ]);
        DB::table('social_networks')->insert([
            'name' => 'WhatsApp',
            'page_url' => 'https://wa.me/56934966104',
            'path_img' => 'img/social_networks/logo_wsp.png',
            'user_id' => 1, 
        ]);

    }
}
