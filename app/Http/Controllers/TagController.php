<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{

    public function index($slug_tagname){
        $tag = Tag::where('slug',$slug_tagname)->firstOrFail();
        $posts = $tag->posts;
        return view('tag',compact('posts','tag'));
    }

 }
