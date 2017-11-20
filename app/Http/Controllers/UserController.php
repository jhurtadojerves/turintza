<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function catalog()
    {
        $users = [
            'Julio',
            'Juan',
            'Pedro',
            'Manuel'
        ];

        return view('users.list', compact('users'));
    }

    public function detail($id)
    {
        return "Mostrando detalles del usuario: {$id}";
    }

    public function create()
    {
        return 'Crear nuevo usuario';
    }

}
