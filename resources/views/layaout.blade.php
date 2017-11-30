<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta meta="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Required meta tags -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <script src="https://use.fontawesome.com/dcd4eacce0.js"></script>

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/blueimp-gallery.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>

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

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Información
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/">Inicio</a>
                                <a class="dropdown-item" href="{{ route('home.geography') }}">Geografía</a>
                                <a class="dropdown-item" href="{{ route('home.culture') }}">Cultura</a>
                                <a class="dropdown-item" href="{{ route('home.how') }}">¿Cómo llegar?</a>
                            </div>
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
                                <a class="dropdown-item" href="#">Detalles</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>
                        @endguest

                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </div>
            </nav>
        </div>
    </section>

    <section class="row titulo" >
        <div class="col">
            <nav class="" aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb bg-orange text-white">
                    <li class="breadcrumb-item " aria-current="page"><h1>Turismo</h1></li>
                </ol>
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

        <div class="card col-lg-9 bg-light">
            <div class="card-body">
                {!! Alert::render() !!}
                @yield('content')
            </div>
        </div>

        <div class="card col col-lg-3 bg-light">
            <div class="card-body"><ul class="list-group">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Morbi leo risus</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul></div>
        </div>

    </section>

    <section class="row footer">

    </section>
    <br><br>
</div>

<!-- Optional JavaScript -->
<!-- Jquery first, then Popper.js, then Bostrap JS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="/js/blueimp-gallery.min.js"></script>


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


