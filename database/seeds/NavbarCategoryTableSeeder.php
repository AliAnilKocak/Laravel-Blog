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


        DB::table('navbar_category')->insert([
            'name' => 'News',
            'slug' => 'news',
            'color' => '#4BB92F'
        ]);
        DB::table('navbar_category')->insert([
            'name' => 'Popular',
            'slug' => 'popular',
            'color' => '#ff8700'
        ]);
        DB::table('navbar_category')->insert([
            'name' => 'Web Design',
            'slug' => 'web-design',
            'color' => '#0078ff'
        ]);
        DB::table('navbar_category')->insert([
            'name' => 'Javascript',
            'slug' => 'javascript',
            'color' => '#8d00ff'
        ]);
        DB::table('navbar_category')->insert([
            'name' => 'Css',
            'slug' => 'css',
            'color' => '#4BB92F'
        ]);
        DB::table('navbar_category')->insert([
            'name' => 'Jquery',
            'slug' => 'jquery',
            'color' => '#ff8700'
        ]);
    }
}
