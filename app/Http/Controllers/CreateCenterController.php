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
        $this->validate($request, [
           'name' => 'required',
           'geolocation' => 'required',
           'owner' => 'required',
            'description' => 'required',
        ]);

        $post = Center::create($request->all());

        return $post->name;
    }
}
