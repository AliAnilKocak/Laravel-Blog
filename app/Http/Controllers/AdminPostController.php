<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AdminPostController extends Controller
{
    public function index(){
        $list = Post::orderByDesc('created_at')->paginate(12);
        return view('admin.posts',compact('list'));
    }
}
