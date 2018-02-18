@extends('layaout')

@section('title')
    Tiwintza Ecológica y Turística.
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="/">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ecología y Turismo</li>
@endsection

@section('content')
    <h1 class="text-center">
        Tiwintza Ecológica y Turística.
    </h1> <br>

    <article class="text-justify">
        <p>Por su topografía y ubicación privilegiada Tiwintza amalgama exuberantes muestras de flora y fauna muchas de ellas quizá aún desconocida para la ciencia por su amplia diversidad y situación inalterada.</p>

        <p>Dispone de varios ríos navegables desde y hacia comunidades con el Perú y Brasil, paradisiacas lagunas rodeada de abundante vegetación, hogar de exquisita avifauna, hogar de caimanes y anacondas, misteriosas cuevas y bellas cascadas, son entre otros recursos muestras del alto potencial turístico por descubrir; al estar ubicado en una zona estratégica del quinto eje vial o vía interoceánica Manta-Manaos, el cantón se abre al Ecuador y el mundo como nuevo destino turístico para la práctica de múltiples actividades de descanso y diversiones, todas esta enmarcadas en el buen uso de los recursos  naturales y el respeto a las manifestaciones culturales, en si al uso sostenibles de los recursos.</p>

        <p>Tiwintza, “Ecológico y Turístico”, se construye en un lugar ideal para disfrutar del turismo vivencial, el aviturismo, el ecoturismo, el turismo comunitario y de aventura; posibilita la práctica de diversas actividades  como el senderismo, la navegación, la observación de aves, la espeleología, la encierra una autentica y nueva experiencia para disfrutar de la diversidad escondida en la jungla.</p>
    </article>

    <script>
        const element = document.getElementById("home-index")
        element.classList.add("active")
    </script>


@endsection