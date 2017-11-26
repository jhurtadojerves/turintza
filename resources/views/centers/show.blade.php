@extends('layaout')

@section('title')
    {{$center->name}} - Turintza
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="/">Inicio</a></li>
    <li class="breadcrumb-item" aria-current="page">Centros</li>
    <li class="breadcrumb-item active" aria-current="page">{{$center->name}}</li>
@endsection

@section('content')
    <h1>{{$center->name}}</h1>

    <p>{{$center->description}}</p>

    <p><b>Propietario: </b> {{$center->owner}}</p>

    {!! Form::open(['route' => ['comments.store', $center], 'method' => 'POST']) !!}

        {!! Field::textarea('content') !!}
        {!! Field::number('ranking', ['max' => '5', 'min'=> '1', ]) !!}

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Comentar</button>
            </div>
        </div>


    {!! Form::close() !!}

    @foreach($center->latestComments as $comment)
        <article>
            {{ $comment->content }}
        </article>

    @endforeach

@endsection