@extends('layaout')

@section('title')
    {{$neww->name}} - Turintza
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="/">Inicio</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('news.index') }}">Noticias</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$neww->name}}</li>
@endsection

@section('content')
    <h3 class="text-center text-capitalize">
        {{$neww->name}}
        @can('create', App\Neww::class)
            <a type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Editar noticia" href="#"><i class="fa fa-pencil" aria-hidden="true"></i>
            </a>
        @endcan
    </h3>
    <br>
    <div class="card">
        <img class="card-img-top" src="/images/news/{{ $neww->cover  }}" alt="{{ $neww->name  }}" title="{{ $neww->name  }}">
        <div class="card-body">
            <h5 class="card-title"</h5>
            <article class="card-text text-justify">
                {!! $neww->safe_html_description !!}
            </article>
        </div>
        <div class="card-footer">
            <small class="text-muted">Última actualización: {{ $neww->updated_at  }}</small>
        </div>
    </div>
    <div id="disqus_thread"></div>
    <script>
        const element = document.getElementById("news-index")
        element.classList.add("active")
    </script>
@endsection