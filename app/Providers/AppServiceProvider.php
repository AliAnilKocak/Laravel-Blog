<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.partials.navbar', function ($view) {
            // Veriyi çekiyoruz
            $allNavbarCategories = DB::table('navbar_category')->get();
            // panel.blade.php dosyasına users değişkeni adı ile (ilk parametre) gönderiyoruz
            $view->with('allNavbarCategories', $allNavbarCategories);
        });
    }
}
