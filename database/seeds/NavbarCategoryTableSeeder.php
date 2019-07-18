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
            'name' => 'UI',
            'slug' => 'ui',
            'color' => '4'
        ]);
        DB::table('navbar_category')->insert([
            'name' => 'Widgets',
            'slug' => 'widgets',
            'color' => '3'
        ]);
        DB::table('navbar_category')->insert([
            'name' => 'Apps',
            'slug' => 'apps',
            'color' => '1'
        ]);
        DB::table('navbar_category')->insert([
            'name' => 'Libraries',
            'slug' => 'libraries',
            'color' => '2'
        ]);
        DB::table('navbar_category')->insert([
            'name' => 'Learn Flutter',
            'slug' => 'learn',
            'color' => '3'
        ]);
        DB::table('navbar_category')->insert([
            'name' => 'Flutter Communities',
            'slug' => 'communities',
            'color' => '4'
        ]);
    }
}
