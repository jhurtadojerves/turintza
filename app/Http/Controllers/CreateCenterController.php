<?php

namespace App\Http\Controllers;

use App\Center as Center;
use Illuminate\Http\Request;
use League\HTMLToMarkdown\HtmlConverter;

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

        $converter = new HtmlConverter(array('strip_tags' => true));
        $markdown = $converter->convert($request->get('description'));


        $center = Center::create([
            'name'          =>  $request->get('name'),
            'geolocation'   =>  $request->get('geolocation'),
            'owner'         =>  $request->get('owner'),
            'description'   =>  $markdown,

        ]);

        \Alert::success("El centro turístico $center->name se registró correctamente");

        return redirect($center->url);
    }
}
