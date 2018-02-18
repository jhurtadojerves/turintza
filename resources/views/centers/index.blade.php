@extends('layaout')

@section('title')
    Centros Turísticos del Cantón Twintza
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home.index') }}">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Centros</li>
@endsection

@section('content')
    <h1>
        Listado de Centros Turísticos
        @can('create', App\Center::class)
            <a type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Agregar centro" href="{{route('centers.create')}}"><i class="fa fa-plus" aria-hidden="true"></i>
            </a>
        @endcan
    </h1>

    <ul>
        @foreach($centers as $center)
            <li><a href="{{ $center->url }}">{{ $center->name }}</a></li>
        @endforeach
    </ul>

    <nav aria-label="Paginación de los centros turísticos">
        {{ $centers->links() }}
    </nav>

    <script>
        const element = document.getElementById("centers-index")
        element.classList.add("active")
    </script>

@endsection