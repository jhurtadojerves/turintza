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

    <section id="center">
        <article>
            <p>{{$center->description}}</p>

            <p><b>Propietario: </b> {{$center->owner}}</p>
        </article>
    </section>

    <section id="comments">
        <!--<aside id="toggle"><button type="button" class="btn btn-info">Escribir un comentario</button></aside> !-->

        <section id="detail" style="padding-top: 60px;">
            <h2>Comentarios</h2>
            @foreach($comments as $comment)
                <div class="card" style="margin-top: 10px;">
                    <div class="card-header">
                        <strong>Autor: <a href="#">{{$comment->user->name}}</a></strong>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-justify">{{$comment->content}}</p>
                    </div>
                    <div class="card-footer text-muted">
                        {{$comment->created_at}}
                    </div>
                </div>
            @endforeach
            {{$comments->links()}}
        </section>
        <section id="toggle-form" style="padding-top: 60px;">
            <h2>Realizar un comentario</h2>
            {!! Form::open(['route' => ['comments.store', $center], 'method' => 'POST']) !!}

            {!! Field::textarea('content', ['style' => 'height: 100px;']) !!}
            {!! Field::number('ranking', ['max' => '5', 'min'=> '1', ]) !!}

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Comentar</button>
                </div>
            </div>
            {!! Form::close() !!}
        </section>

    </section>

@endsection