<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CenterController extends Controller
{
    public function catalog()
    {
        $centers = [
            'Parque central',
            'Cascadas sagradas',
            'Cabañas bonitas',
            'Otro centro hermoso'
        ];

        return view('centers.list', compact('centers'));
    }
}
