<?php

namespace App\Http\Controllers;

use App\Center;
use Illuminate\Http\Request;

class CreateCenterController extends Controller
{
    public function create()
    {
        $this->authorize('create',  auth()->user());

        return view('centers.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create',  auth()->user());

        $this->validate($request, [
           'name' => 'required',
           'geolocation' => 'required',
           'owner' => 'required',
            'description' => 'required',
        ]);

        $center = Center::create($request->all());

        return redirect($center->url);
    }
}
