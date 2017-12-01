@extends('layaout')

@section('title')
    {{$user->name}} - Turintza
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="/">Inicio</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="#">Usuarios</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
@endsection

@section('content')

    <h1 class="text-center">
        {{ $user->name }}
    </h1>
    <br>
    <section id="center" class="align-items-center">
        <article class="text-justify">
            <strong>Email: </strong> {{ $user->email }} <br>
            <strong>Tipo de usuario: </strong> {{ $user->type }}
        </article>
        <br><br>
        <article class="text-justify">
            <h2>Comentarios de {{ $user->name }}</h2>

            <section id="comments" class="align-items-center">
                <!--<aside id="toggle"><button type="button" class="btn btn-info">Escribir un comentario</button></aside> !-->

                <section id="detail" style="padding-top: 60px;">
                    <h2>Comentarios</h2>
                    @foreach($comments as $comment)
                        <div class="card" style="margin-top: 10px;">
                            <div class="card-header">
                                <strong>Centro: <a href="{{ $comment->center->url }}#comment-{{$comment->id}}">{{$comment->center->name}}</a></strong>
                            </div>
                            <div class="card-body">
                                {!! $comment->safe_html_content !!}
                            </div>
                            <div class="card-footer text-muted">
                                {{$comment->created_at}}
                            </div>
                        </div>
                    @endforeach

                </section>
                <nav style="margin-top:20px; "aria-label="Paginación de los comentarios del centro turístico {{$user->name}}" class="card bg-light border-light">
                    {{ $comments->links() }}
                </nav>


            </section>

        </article>

    </section>
@endsection