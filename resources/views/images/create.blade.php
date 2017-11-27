@extends('layaout')

@section('title')
    Agregar imagen - {{ $center->name }} - Turintza
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="/">Inicio</a></li>
    <li class="breadcrumb-item" aria-current="page">Centros</li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{$center->url}}">{{$center->name}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Agregar imagen</li>
@endsection

@section('content')
    <h1></h1>

    {!! Form::open(['method' => 'POST', 'route' => ['images.store', $center, $center->slug], 'files' => true]) !!}
        <h1>Seleccionar una imagen</h1>
        <br><br>
        <div class="form-group">
            <div class="col-md-12 col-md-offset-4">
                {!! Form::file('image', ['class' => 'form-control', 'type' => 'image', 'required' => 'required',]) !!}
            </div>
        </div>
    <br><br>
        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Agregar imagen</button>
            </div>
        </div>

    {!! Form::close() !!}

@endsection