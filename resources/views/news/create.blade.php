@extends('layaout')

@section('title')
    Agregar Noticia - Turintza
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="/">Inicio</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('news.index') }}">Noticias</a></li>
    <li class="breadcrumb-item active" aria-current="page">Agregar</li>
@endsection

@section('content')
    <script src="https://cdn.ckeditor.com/4.7.3/basic/ckeditor.js"></script>
    <h1>Agregar Noticia</h1>

    {!! Form::open(['method' => 'POST', 'route' => 'news.store', 'files' => true ]) !!}

        {!! Field::text('name') !!}
        <br>
        {!! Field::textarea('content') !!}
        <br>
        <p>Elegir una imagen para la cabecera de la noticia</p>
        {!! Form::file('cover', ['class' => 'form-control',]) !!}
        @foreach ($errors->get('cover') as $message)
            <p class="help-block">{{ $message }}</p>
        @endforeach
        <br>
        {!! Form::submit('Agregar noticia', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
    <br><br>

    <script>
        CKEDITOR.replace( 'content' )
        const element = document.getElementById("news-index")
        element.classList.add("active")
    </script>

@endsection