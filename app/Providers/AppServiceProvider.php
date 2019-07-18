<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Models\Post;

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



        View::composer('*', function ($view) {
            // Veriyi çekiyoruz
            $allNavbarCategories = DB::table('navbar_category')->get();
            $allTags = DB::table('tag')->get();

            $show_featured_boot = Post::select('post.*')
                ->join('post_detail', 'post_detail.post_id', 'post.id')
                ->where('post_detail.show_featured', 1)
                ->orderBy('updated_at', 'desc')
                ->take(2)
                ->get();

            $show_most_read_boot = Post::select('post.*')
                ->join('post_detail', 'post_detail.post_id', 'post.id')
                ->where('post_detail.show_most_read', 1)
                ->orderBy('updated_at', 'desc')
                ->take(4)
                ->get();
            // panel.blade.php dosyasına users değişkeni adı ile (ilk parametre) gönderiyoruz
            $view->with('allNavbarCategories', $allNavbarCategories)
                ->with('show_featured_boot', $show_featured_boot)
                ->with('show_most_read_boot', $show_most_read_boot)
                ->with('allTags', $allTags);
        });
    }
}
