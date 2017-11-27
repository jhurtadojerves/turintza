@extends('layaout')

@section('title')
    Crear Centro Turístico - Turintza
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="/">Inicio</a></li>
    <li class="breadcrumb-item" aria-current="page">Centros</li>
    <li class="breadcrumb-item active" aria-current="page">Crear</li>
@endsection

@section('content')
    <h1>Crear Centro Turístico</h1>

    {!! Form::open(['method' => 'POST', 'route' => 'centers.store']) !!}
        {!! Field::text('name') !!}
        {!! Field::textarea('description') !!}
        {!! Field::text('geolocation') !!}
        {!! Field::text('owner') !!}
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    {!! Form::close() !!}

@endsection