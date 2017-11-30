@extends('layaout')

@section('title')
    {{$center->name}} - Turintza
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="/">Inicio</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('centers.index') }}">Centros</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$center->name}}</li>
@endsection

@section('content')

    <h1>{{$center->name}}</h1>

    <section id="center" class="align-items-center">
        <article>
            <p>{{$center->description}}</p>

            <p><b>Propietario: </b> {{$center->owner}}</p>
        </article>
    </section>

    <section id="imagenes" class="align-items-center justify-content-center">
        <h2 style="padding: 10px;" class="col-md-12" >Imagenes @can('create', App\Center::class)
                <a type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Agregar imagen" href="{{route('images.create', [$center, $center->slug])}}">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </a>
            @endcan</h2>
            <div id="links">
                @foreach($images as $image)
                    <a href="{{ $image->url }}" class="remove-hover">
                        <img src="{{Croppa::url("images/centers/$image->name", 50, 50)}}" alt="" class="img-thumbnail rounded-circle img-fluid">
                    </a>
                @endforeach
            </div>



        <!--
        <div class="col">
            <div class="card-group card" id="links">
            <div class="row">
                @foreach($images as $image)
                    <div class="col-md-2">
                        <div class="card" style="width: 100%; margin:5px;">
                    <a href="{{$image->url}}" class="card">
                        <img class="card-img" src="{{ $image->url }}" style=" border-style:ridge;border-width:2px;">
                    </a>
                    </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
        -->

    </section>

    <script src="https://cdn.ckeditor.com/4.7.3/basic/ckeditor.js"></script>

    <section id="comments" class="align-items-center">
        <!--<aside id="toggle"><button type="button" class="btn btn-info">Escribir un comentario</button></aside> !-->

        <section id="detail" style="padding-top: 60px;">
            <h2>Comentarios</h2>
            @foreach($comments as $comment)
                <div class="card" style="margin-top: 10px;">
                    <div class="card-header">
                        <strong>Autor: <a href="#">{{$comment->user->name}}</a></strong>
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
        <nav style="margin-top:20px; "aria-label="Paginación de los comentarios del centro turístico {{$center->name}}" class="card bg-light border-light">
            {{$comments->links()}}
        </nav>
        <section id="form" style="padding-top: 60px;">
            <h2>Realizar un comentario</h2>
            {!! Form::open(['route' => ['comments.store', $center], 'method' => 'POST']) !!}

            {!! Field::textarea('content', ['style' => 'height: 200px;', 'id' => 'summernote']) !!}
            {!! Field::number('ranking', ['max' => '5', 'min'=> '1', ]) !!}

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Comentar</button>
                </div>
            </div>
            {!! Form::close() !!}
        </section>

    </section>
    <script>
        CKEDITOR.replace( 'content' );
    </script>
    <script>
        document.getElementById('links').onclick = function (event) {
            event = event || window.event;
            var target = event.target || event.srcElement,
                link = target.src ? target.parentNode : target,
                options = {index: link, event: event},
                links = this.getElementsByTagName('a');
            blueimp.Gallery(links, options);
        };
    </script>

    <div id="blueimp-gallery" class="blueimp-gallery">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
    </div>
@endsection