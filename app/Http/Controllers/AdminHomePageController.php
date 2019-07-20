<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminHomePageController extends Controller
{
    public function index(){
        return view('admin.homepage');
    }
}
