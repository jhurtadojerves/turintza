<?php

namespace App\Http\Controllers;

use App\{Center, Comment};
use Illuminate\Http\Request;
use League\HTMLToMarkdown\HtmlConverter;


class CommentController extends Controller
{
    public function store(Request $request, Center $center)
    {

        $converter = new HtmlConverter(array('strip_tags' => true));
        $markdown = $converter->convert($request->get('content'));

        $this->validate($request, [
            'content' => 'required',
            'ranking' => 'required',
        ], [
            'ranking.required' => 'Debes seleccionar al menos una estrella',
            'content.required' => 'No puedes enviar tu comentario si no escribes algo en el editor'
        ]);

        $comment = new Comment([
            'content' => $markdown,
            'ranking' => $request->get('ranking'),
            'center_id' =>  $center->id,
        ]);

        auth()->user()->comments()->save($comment);
        \Alert::success("El comentario fue agregado correctamente");
        return redirect($center->url);

    }
}
