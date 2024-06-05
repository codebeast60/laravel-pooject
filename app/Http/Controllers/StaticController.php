<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    function home()
    {
        return view('welcome');
    }
    function about()
    {
        return view('about');
    }
    function test()
    {
        return view('/profile/test');
    }
}
