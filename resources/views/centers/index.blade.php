@extends('layaout')

@section('title')
    Centros Turísticos del Cantón Twintza
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Inicio</li>
@endsection

@section('content')
    <h1>
        Listado de Centros Turísticos
        @can('accept', @auth()->user())
            <a type="button" class="btn btn-secondary" href="#"><i class="fa fa-plus" aria-hidden="true"></i> Crear
            </a>
        @endcan
    </h1>

    <ul>
        @foreach($centers as $center)
            <li><a href="{{ $center->url }}">{{ $center->name }}</a></li>
        @endforeach
    </ul>

    {{ $centers->render() }}

@endsection