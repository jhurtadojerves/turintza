@extends('layaout')

@section('title')
    Geografía - Cantón Twintza
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="/">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Geografía</li>
@endsection

@section('content')
    <h1 class="text-center">
        Geografía del Cantón.
    </h1> <br>

    <article class="text-justify">

        <p>El Cantón Tiwintza, se encuentra localizado al sureste de la Provincia de Morona Santiago, se extiende entre los valles de los ríos Santiago y Morona desde la parte baja de las estribaciones del Cutucú hasta la frontera con la República del Perú en la Cordillera del Cóndor.</p>

        <ul>
            <li><strong>País:</strong> República del Ecuador</li>
            <li><strong>Provincia:</strong> Morona Santiago</li>
            <li><strong>Cabecera Cantonal:</strong> Santiago</li>
            <li><strong>División Política:</strong> 2 Parroquias, Santiago y San José de Morona</li>
            <li><strong>Extensión Territorial:</strong> 1.197 km2</li>
            <li><strong>Población:</strong> 6.995 habitantes</li>
            <li><strong>Grupos Étnicos:</strong> Mestizos / Shuar</li>
            <li><strong>Idiomas:</strong> Español / Shuar</li>
            <li><strong>Altitud:</strong> Santiago 294 m.s.n.m y San José de Morona 188 m.s.n.m.</li>
            <li><strong>Clima:</strong> Cálido-húmedo tropical</li>
            <li><strong>Temperatura:</strong> Promedio 25,5 ºC, con máxima de 28 ºC y mínima de 23 ºC.</li>
            <li><strong>Precipitación:</strong> Medida anual 3749 mm</li>
            <li><strong>Humedad:</strong> Humedad relativa anual promedio de 83,08 %</li>
            <li><strong>Ríos Principales:</strong> Santiago, Morona, Yaupi</li>
        </ul>

    </article>

    <script>
        const element = document.getElementById("home-geography")
        element.classList.add("active")
    </script>

@endsection