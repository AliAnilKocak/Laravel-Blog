<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostDetail;
use App\Models\Post;

class HomePageController extends Controller
{
    public function index()
    {
        //$categories = Category::whereRaw('parent_id is null')->take(8)->get();
        //error_log($categories);
        $show_banner = PostDetail::with('post')->where('show_banner', 1)->take(2)->get();
        //error_log($categories);

        $show_recently = Post::select('post.*')
            ->join('post_detail', 'post_detail.post_id', 'post.id')
            ->where('post_detail.show_recently', 1)
            ->orderBy('updated_at', 'desc')
            ->take(6)
            ->get();

        $show_most_read = Post::select('post.*')
            ->join('post_detail', 'post_detail.post_id', 'post.id')
            ->where('post_detail.show_most_read', 1)
            ->orderBy('updated_at', 'desc')
            ->take(4)
            ->get();

        $show_most_read_sidebar = Post::select('post.*')
            ->join('post_detail', 'post_detail.post_id', 'post.id')
            ->where('post_detail.show_most_read_sidebar', 1)
            ->orderBy('updated_at', 'desc')
            ->take(4)
            ->get();

        $show_featured = Post::select('post.*')
            ->join('post_detail', 'post_detail.post_id', 'post.id')
            ->where('post_detail.show_featured', 1)
            ->orderBy('updated_at', 'desc')
            ->take(3)
            ->get();

        $show_featured_sidebar = Post::select('post.*')
            ->join('post_detail', 'post_detail.post_id', 'post.id')
            ->where('post_detail.show_featured_sidebar', 1)
            ->orderBy('updated_at', 'desc')
            ->take(2)
            ->get();

        $normal = Post::select('post.*')
            ->join('post_detail', 'post_detail.post_id', 'post.id')
            ->where('post_detail.normal', 1)
            ->orderBy('updated_at', 'desc')
            ->take(6)
            ->get();

        $show_big = Post::select('post.*')
            ->join('post_detail', 'post_detail.post_id', 'post.id')
            ->where('post_detail.show_big', 1)
            ->orderBy('updated_at', 'desc')
            ->take(1)
            ->get();


        return view('home', compact(
            'show_banner',
            'show_recently',
            'show_most_read',
            'show_most_read_sidebar',
            'show_featured',
            'show_featured_sidebar',
            'normal',
            'show_big'
        ));
    }

    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contacts');
    }
}
