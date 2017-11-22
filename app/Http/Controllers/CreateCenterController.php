<?php

namespace App\Http\Controllers;

use App\Center;
use Illuminate\Http\Request;

class CreateCenterController extends Controller
{
    public function create()
    {
        return view('centers.create');
    }

    public function store(Request $request)
    {
        $post = Center::create($request->all());

        return $post->name;
    }
}
