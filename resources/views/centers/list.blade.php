@extends('layaout')

@section('title')
    Centros Turísticos del Cantón Twintza
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Inicio</li>
@endsection

@section('content')
    <h1>Listado de Centros Turísticos</h1>

    <ul>
        @forelse($centers as $center)
            <li>{{ $center }}</li>
        @empty
            <li>No hay centros turisticos registrados</li>
        @endforelse
    </ul>

@endsection