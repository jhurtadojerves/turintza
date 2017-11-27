<?php

namespace App\Http\Controllers;

use App\Center as Center;
use Illuminate\Http\Request;

class CreateCenterController extends Controller
{
    public function create()
    {
        $this->authorize('create', Center::class);

        return view('centers.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Center::class);

        $this->validate($request, [
           'name' => 'required',
           'geolocation' => 'required',
           'owner' => 'required',
            'description' => 'required',
        ]);

        $center = Center::create($request->all());

        \Alert::success("El centro turístico $center->name se registró correctamente");

        return redirect($center->url);
    }
}
