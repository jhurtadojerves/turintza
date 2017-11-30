<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function geography()
    {
        return view('home.geography');
    }

    public function culture()
    {
        return view('home.culture');
    }

    public function how()
    {
        return view('home.how');
    }

}
