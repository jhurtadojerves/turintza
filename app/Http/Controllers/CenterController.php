<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Center;

class CenterController extends Controller
{
    public function index()
    {
        $centers = Center::paginate();

        return view('centers.index', compact('centers'));
    }

    public function show(Center $center, $slug) {

        if ($center->slug != $slug) {
            return redirect($center->url, 301);
        }

        $comments = Comment::where('center_id', '=', $center->id)
            ->orderBy('created_at', 'DESC')
            ->paginate();

        $images = $center->images()->get();

        return view('centers.show', compact(['center', 'comments', 'images']));
    }


}
