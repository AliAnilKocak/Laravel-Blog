<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tag')->truncate();

        $ui =   DB::table('tag')->insertgetId([
            'name' => 'UI',
            'slug' => 'ui'
        ]);

        $widgets =   DB::table('tag')->insertgetId([
            'name' => 'Widgets',
            'slug' => 'widgets'
        ]);

        $input =   DB::table('tag')->insertgetId([
            'name' => 'Input',
            'slug' => 'input'
        ]);

        $components =   DB::table('tag')->insertgetId([
            'name' => 'Components',
            'slug' => 'components'
        ]);

        $apps =   DB::table('tag')->insertgetId([
            'name' => 'Apps',
            'slug' => 'apps'
        ]);

        $learn =   DB::table('tag')->insertgetId([
            'name' => 'Learn Flutter',
            'slug' => 'learn'
        ]);

        $communities =   DB::table('tag')->insertgetId([
            'name' => 'Flutter communities',
            'slug' => 'communities'
        ]);
    }
}
