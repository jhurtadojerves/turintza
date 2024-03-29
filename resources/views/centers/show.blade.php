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
    @if(strlen($errors) > 2)
        <script>
            $(function() {
                $('html,body').animate({
                    scrollTop: $("#form").offset().top
                }, 0);
            })
        </script>
    @endif
    <h1>
        {{$center->name}}
        @can('create', App\Center::class)
            <a type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Editar centro" href="{{route('centers.edit', [$center, $center->slug])}}"><i class="fa fa-pencil" aria-hidden="true"></i>
            </a>
        @endcan
    </h1>
    <span class="star star-{{ $center->global_valoration }}">
        @for ($i=1; $i<=5; $i++)
            <i class="fa fa-star" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="{{ $center->global_valoration }} estrellas"></i>
        @endfor
    </span>
    <h2></h2>
    <br>
    <section id="center" class="align-items-center">
        <article class="text-justify">
            {!! $center->safe_html_description !!}
            <p><b>Propietario: </b> {{$center->owner}}</p>
            {!! $mapHelper->render($map) !!}
            {!! $apiHelper->render([$map]) !!}

            <script>
                $(document).ready(function(){
                    $("#map").css("max-width", "100%");
                    $("#map").css("width", "100%");
                });
                const element = document.getElementById("centers-index")
                element.classList.add("active")
            </script>


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

    </section>

    <script src="https://cdn.ckeditor.com/4.7.3/basic/ckeditor.js"></script>

    <section id="comments" class="align-items-center">
        <section id="detail" style="padding-top: 60px;">
            <h2>Comentarios</h2>
            @foreach($comments as $comment)
                <a name="comment-{{ $comment->id }}"></a>
                <div class="card" style="margin-top: 10px;">
                    <div class="card-header">
                        <strong>Autor:</strong> <a href="{{ $comment->user->url }}">{{$comment->user->name}}</a>
                        <span class="star star-{{ $comment->ranking }}">
                        @for ($i=1; $i<=5; $i++)
                        <i class="fa fa-star" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="{{ $comment->ranking }} estrellas"></i>
                        @endfor
                        </span>
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

            @foreach ($errors->all() as $message)
                <p class="help-block">{{ $message }}</p>
            @endforeach
            {!! Form::open(['route' => ['comments.store', $center], 'method' => 'POST']) !!}
            <label for="ranking">Valorar el centro turístico</label>
            <input class="rating" data-max="5" data-min="1" id="some_id" name="ranking" type="number" data-icon-lib="fa" data-active-icon="fa-star" data-inactive-icon="fa-star-o" data-clearable-icon="fa-trash-o"/>

            {!! Field::textarea('content', ['style' => 'height: 200px;', 'id' => 'summernote']) !!}


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