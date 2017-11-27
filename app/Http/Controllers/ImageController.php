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
        $this->validate($request, [
            'image' => 'required',
        ]);

        //Images manipulate

        $file = $request->file('image');

        if (strpos($file->getClientMimeType(), 'image')!== false)
        {
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
        else{
            \Alert::danger("Elija una imagen con un formato válido (PNG/JPEG)");
            return redirect(route('images.create', [$center, $center->slug]));
        }

        /*

        */

    }

}
