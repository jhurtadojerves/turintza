@extends('layaout')

@section('title')
    {{$center->name}} - Turintza
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="/">Inicio</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="/centros/">Centros</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$center->name}}</li>
@endsection

@section('content')
    <h1>{{$center->name}}</h1>

    <p>{{$center->description}}</p>

    <p><b>Propietario: </b> {{$center->owner}}</p>

@endsection