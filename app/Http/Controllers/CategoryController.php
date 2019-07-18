<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index($slug_categoryname){
        $category = Category::where('slug',$slug_categoryname)->firstOrFail();
        $posts = $category->posts;
        return view('category',compact('posts','category'));
    }
}
