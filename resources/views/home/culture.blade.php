@extends('layaout')

@section('title')
    Cultura - Cantón Twintza
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="/">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cultura</li>
@endsection

@section('content')
    <h1 class="text-center">
        Patrimonio Cultural: Los Shuar.
    </h1> <br>

    <aticle class="text-justify">
        <p>El shuar siempre ha tenido una ideología particular del medio ambiente y la ecología que están a su alrededor y, por sobre todo, de su relación con el Territorio. De acuerdo a la cosmovisión de los shuar el Territorio “Ii  Nunke” “Nuestro Territorio”  es el símbolo de la fertilidad y todos deberían  tener acceso a ella, porque es un recurso  para la subsistencia y por tanto nadie puede ser privado de sus beneficios.</p>
        <p>La característica principal de la filosofía shuar es un gran amor y respeto por la calidad sagrada del territorio  que ha dado luz y ha alimentado a  la cultura shuar. El territorio es fuente de la existencia, como de la humanidad, pues de sus entrañas nacen las plantas y los frutos de nuestro sustento; he ahí la esencia de nuestra actitud equilibrada y armónica. Si no lo entendemos así la tierra será diezmada, depredada y, consecuentemente, el hombre se individualizará en su egoísmo, sucumbiendo en las sociedades jerarquizadas en clases sociales. .</p>

        <p>La organización estatal y privada tiene una visión únicamente de explotación económica y de desarrollo. Los Shuar de Santiago y San José de Morona deben plantear, a partir de su cosmovisión,  un nuevo paradigma de desarrollo sustentable ecológicamente y sostenible económicamente. .</p>

    </aticle>
    <script>
        const element = document.getElementById("home-culture")
        element.classList.add("active")
    </script>

@endsection