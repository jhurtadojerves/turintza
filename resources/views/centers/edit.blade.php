@extends('layaout')

@section('title')
    Crear Centro Turístico - Turintza
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="/">Inicio</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('centers.index') }}">Centros</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('centers.show', [$center, $center->slug]) }}">{{ $center->name }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar</li>
@endsection

@section('content')
    <script src="https://cdn.ckeditor.com/4.7.3/basic/ckeditor.js"></script>
    <h1>Editar centro turístico: {{ $center->name }}</h1>

    {!! Form::open(['method' => 'PUT', 'route' => ['centers.update', $center, $center->slug]]) !!}
        {!! Field::text('name', $center->name) !!}
        {!! Field::textarea('description', $center->safe_html_description) !!}
        {!! Field::text('geolocation', $center->geolocation) !!}
        {!! Field::text('owner', $center->owner) !!}
        {!! Form::submit('Guardar centro', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
    <br><br>

    <script>
        CKEDITOR.replace( 'description' );
    </script>

@endsection