@extends('layaout')

@section('title')
    Centros Turísticos del Cantón Twintza
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="/">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Noticias</li>
@endsection

@section('content')
    <h1>
        Noticias publicadas
        @can('create', App\Neww::class)
            <a type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Nueva noticia" href="{{ route('news.create') }}"><i class="fa fa-plus" aria-hidden="true"></i>
            </a>
        @endcan
    </h1>

    <ul>
        @foreach($news as $new)
            <li><a href="{{ $new->url  }}">{{ $new->name }}</a></li>
        @endforeach
    </ul>

    <nav aria-label="Paginación de las noticias">
        {{ $news->links() }}
    </nav>

    <script>
        const element = document.getElementById("news-index")
        element.classList.add("active")
    </script>

@endsection