<?php

use Illuminate\Database\Seeder;
use Illuminate\support\Facades\DB;

class NavbarCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('navbar_category')->truncate();

        DB::table('navbar_category')->insert([
            'name' => 'News',
            'slug' => 'news',
            'color' => ''
        ]);
        DB::table('navbar_category')->insert([
            'name' => 'Popular',
            'slug' => 'popular',
            'color' => ''
        ]);
        DB::table('navbar_category')->insert([
            'name' => 'Web Design',
            'slug' => 'web-design',
            'color' => '1'
        ]);
        DB::table('navbar_category')->insert([
            'name' => 'Javascript',
            'slug' => 'javascript',
            'color' => '2'
        ]);
        DB::table('navbar_category')->insert([
            'name' => 'Css',
            'slug' => 'css',
            'color' => '3'
        ]);
        DB::table('navbar_category')->insert([
            'name' => 'Jquery',
            'slug' => 'jquery',
            'color' => '4'
        ]);
    }
}
