@extends('layaout')

@section('title')
    Crear Centro Turístico - Turintza
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="/">Inicio</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('centers.index') }}">Centros</a></li>
    <li class="breadcrumb-item active" aria-current="page">Crear</li>
@endsection

@section('content')
    <script src="https://cdn.ckeditor.com/4.7.3/basic/ckeditor.js"></script>
    <h1>Crear Centro Turístico</h1>

    {!! Form::open(['method' => 'POST', 'route' => 'centers.store']) !!}
        {!! Field::text('name') !!}
        {!! Field::textarea('description') !!}
        {!! Field::text('geolocation') !!}
        {!! Field::text('owner') !!}
        {!! Form::submit('Crear centro', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
    <br><br>

    <script>
        CKEDITOR.replace( 'description' );
    </script>

@endsection