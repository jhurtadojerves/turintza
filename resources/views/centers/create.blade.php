@extends('layaout')

@section('title')
    Centros Turísticos del Cantón Twintza
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Inicio</li>
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