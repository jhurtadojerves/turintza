@extends('layaout')

@section('title')
    Listado de Usuarios
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
@endsection

@section('content')
    <h1>Listado de Usuarios</h1>

    <ul>
        @forelse($users as $user)
            <li>{{ $user }}</li>
        @empty
            <li>No hay usuarios registrados</li>
        @endforelse
    </ul>

@endsection