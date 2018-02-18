<?php

namespace App\Http\Controllers;

use App\Neww;
use Illuminate\Http\Request;
use League\HTMLToMarkdown\HtmlConverter;

class NewController extends Controller
{

    public function index()
    {
        $news = Neww::paginate();
        return view('news.index', compact('news'));
    }

    public function create()
    {
        $this->authorize('create', Neww::class);
        return view('news.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Neww::class);

        $rules = [
            'name' => 'required',
            'content' => 'required',
            'cover' => 'image|required',
        ];

        $messages = [
            'name.required' => 'Es obligatorio ingresar el nombre la noticia',
            'content.required' => 'Es obligatorio ingresar el contenido de la noticia',
            'cover.image' => 'Debes seleccionar una imagen con un formato válido (png, jpg, jpeg, gif)',
            'cover.required' => 'Es obligatorio que la noticia tenga un cover',
        ];

        $this->validate($request, $rules, $messages);

        $converter = new HtmlConverter(array('strip_tags' => true));

        $new_instance = new Neww;

        $new_instance->name = $request->get('name');
        $new_instance->content = $converter->convert($request->get('content'));

        $file = $request->file('cover');
        $name = 'cover-' . $new_instance->slug . '-' . time() . '.' . $file->getClientOriginalExtension();
        $path = public_path() . '/images/news/';
        $file->move($path, $name);

        $new_instance->cover = $name;
        $new_instance->save();

        \Alert::success("La noticia fue agregada correctamente/");
        return redirect($new_instance->url);
    }
    public function show(Neww $neww, $slug)
    {
        if ($neww->slug != $slug) {
            \Alert::info("La noticia $neww->name se movió permanentemente a esta dirección");
            return redirect($neww->url, 301);
        }
        return view('news.show', compact(['neww']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Neww  $neww
     * @return \Illuminate\Http\Response
     */
    public function edit(Neww $neww)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Neww  $neww
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Neww $neww)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Neww  $neww
     * @return \Illuminate\Http\Response
     */
    public function destroy(Neww $neww)
    {
        //
    }
}
