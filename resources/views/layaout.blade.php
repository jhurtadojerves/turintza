<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta meta="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Required meta tags -->
    <link rel='icon' type='image/x-icon' href='{{ asset('favicon.ico') }}' />
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/blueimp-gallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/stars.css') }}">


    <script src="https://use.fontawesome.com/dcd4eacce0.js"></script>
    <script src="{{ asset('/js/jquery-3.2.1.min.js') }}" crossorigin="anonymous"></script>

</head>

<body class="bg-secondary">

<div class="container">
    <section class="row menu">
        <div class="col">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">

                <a class="navbar-brand" href="http://www.tiwintza.gob.ec">Municipio de Tiwintza</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Inicio</a>
                        </li>



                        @guest
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrarse</a></li>
                        @else
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ Auth::user()->url }}">Detalles</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>
                        @endguest

                    </ul>
                    <a href="https://www.facebook.com/GadTiwintza/" style="margin-right: 10px;" target="_blank">
                        <i class="fa fa-facebook-square fa-3x"></i>
                    </a>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </div>
            </nav>
        </div>
    </section>

    <section class="row nav">
        <nav class="col" aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                @yield('breadcrumb')
            </ol>
        </nav>
    </section>

    <section class="card-deck row contenido">

        <div class="card no-gutters col-lg-3 col-md-12 bg-light">
            <div class="list-group" style="margin-top: 10px; margin-bottom: 10px;">
                <a href="{{ route('home.index') }}" class="list-group-item list-group-item-info bg-blue-grey">Ecología y Turismo</a>
                <a href="{{ route('home.geography') }}" class="list-group-item list-group-item-info bg-blue-grey">Geografía</a>
                <a href="{{ route('home.culture') }}" class="list-group-item list-group-item-info bg-blue-grey">Cultura</a>
                <a href="{{ route('home.how') }}" class="list-group-item list-group-item-info bg-blue-grey">¿Cómo llegar?</a>
                <a href="{{ route('centers.index') }}" class="list-group-item list-group-item-info bg-blue-grey">Centros Turísticos</a>
            </div>
        </div>
        <div class="w-100 d-lg-none" style="margin-bottom: 20px;"></div>
        <div class="card no-gutters col-lg-9 bg-light">
            <div class="card-body">
                {!! Alert::render() !!}
                @yield('content')
            </div>
        </div>



    </section>

    <section class="row footer">

    </section>
    <br><br>
</div>

<!-- Optional JavaScript -->
<!-- Jquery first, then Popper.js, then Bostrap JS -->


<script src="{{ asset('/js/popper.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="{{ asset('/js/blueimp-gallery.min.js') }}"></script>
<script src="{{  asset('/js/bootstrap-rating-input.min.js') }}"></script>


<script>
    $( "#toggle" ).click(function() {
        $( "#toggle-form" ).toggle( "slow" );
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

</body>

</html>


