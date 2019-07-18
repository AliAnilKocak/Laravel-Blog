<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->truncate();

        $ui =   DB::table('category')->insertgetId([
            'name' => 'UI',
            'slug' => 'ui'
        ]);

        $widgets =   DB::table('category')->insertgetId([
            'name' => 'Widgets',
            'slug' => 'widgets'
        ]);

        $input =   DB::table('category')->insertgetId([
            'name' => 'Input',
            'slug' => 'input'
        ]);

        $components =   DB::table('category')->insertgetId([
            'name' => 'Components',
            'slug' => 'components'
        ]);

        $apps =   DB::table('category')->insertgetId([
            'name' => 'Apps',
            'slug' => 'apps'
        ]);

        $learn =   DB::table('category')->insertgetId([
            'name' => 'Learn Flutter',
            'slug' => 'learn'
        ]);

        $communities =   DB::table('category')->insertgetId([
            'name' => 'Flutter communities',
            'slug' => 'communities'
        ]);
    }
}
