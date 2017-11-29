<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use App\Center;

class ImageController extends Controller
{
    public function create(Center $center){
        $this->authorize('create', Center::class);
        return view('images.create', compact('center'));
    }

    public function store(Request $request, Center $center)
    {
        $this->authorize('create', Center::class);

        $rules = [
            'image' => 'image|required',
        ];

        $messages = [
          'image.image' => 'El archivo debe ser una imagen',
          'image.required' => 'No puedes enviar el formulario vacío, elije una imagen'
        ];

        $this->validate($request, $rules, $messages);

        //Images manipulate

        $file = $request->file('image');

        $name = 'image-' . $center->slug . '-' . time() . '.' . $file->getClientOriginalExtension();
        $path = public_path() . '/images/centers/';
        $file->move($path, $name);

        $image = new Image([
            'name' =>  $name,
        ]);
        $center->images()->save($image);
        \Alert::success("La imagen se agregó correctamente")
            ->button('Ver', $image->url, 'primary');
        return redirect(route('images.create', [$center, $center->slug]));


    }

}
