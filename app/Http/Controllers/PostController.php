<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index($slug_postname)
    {
        $post = Post::whereSlug($slug_postname)->firstOrFail();

        return view('post', compact('post'));
    }
}
