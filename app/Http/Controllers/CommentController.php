<?php

namespace App\Http\Controllers;

use App\{Center, Comment};
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Center $center)
    {
        $this->validate($request, [
            'content' => 'required',
            'ranking' => 'required',
        ]);

        $comment = new Comment([
            'content' => $request->get('content'),
            'ranking' => $request->get('ranking'),
            'center_id' =>  $center->id,
        ]);

        auth()->user()->comments()->save($comment);

        return redirect($center->url);
    }
}
