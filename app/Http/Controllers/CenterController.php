<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Center;

class CenterController extends Controller
{
    public function show(Center $center) {
        return view('centers.show', compact('center'));
    }
}
