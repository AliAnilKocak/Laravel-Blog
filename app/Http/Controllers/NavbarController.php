<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function index($navbar_slug)
    {

        switch ($navbar_slug) {
            case 'ui':
                return view('page.ui');
                break;
            case 'widgets':
                return view('page.widgets');
                break;

            case 'apps':
                return view('page.apps');
                break;

            case 'libraries':
                return view('page.libraries');
                break;

            case 'learn':
                return view('page.learn');
                break;

            case 'communities':
                return view('page.communities');
                break;

            default:
                return view('home');
                break;
        }
    }
}
