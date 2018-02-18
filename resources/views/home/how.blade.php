@extends('layaout')

@section('title')
    Geografía - Cantón Twintza
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="/">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cultura</li>
@endsection

@section('content')
    <h1 class="text-center">
        ¿Cómo llegar?
    </h1> <br>

    <aticle class="text-justify">
        <p>
            Tiwintza cuenta con una vía de acceso terrestre, y es la vía Méndez – San José de Morona, que inicia en la “Y” de Patuca y concluye en San José de Morona, es una vía asfaltada de primer orden. Esta arteria que forma parte del quinto eje multimodal de la  Interoceánica  Manta – Manaos, ya que integra AL Ecuador a una propuesta de intercambio comercial, turístico y político con Perú, Brasil y otros países, enlazando el Océano Pacifico con el atlántico otros medios de acceso para visitar Tiwintza en la vía aérea a solo 30 minutos de Macas y a 45 minutos de la Shell, presentado por la logística militar o también se puede contratar los fletes de avionetas del servicio aéreo particular o misional.
        </p>

        <p>
            {!! $mapHelper->render($map) !!}
            {!! $apiHelper->render([$map]) !!}

            <script>
                $(document).ready(function(){
                    $("#map").css("max-width", "100%");
                    $("#map").css("width", "100%");
                });

                const element = document.getElementById("home-how")
                element.classList.add("active")

            </script>
        </p>

    </aticle>

@endsection