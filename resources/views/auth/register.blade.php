@extends('layaout')

@section('content')

    {!! Form::open(['method' => 'POST', 'route' => 'register']) !!}
    {!! Field::text('name') !!}
    {!! Field::email('email') !!}
    {!! Field::password('password') !!}
    {!! Field::password('password_confirmation') !!}
    <button type="submit" class="btn btn-primary">
        Registrar
    </button>
    {!! Form::close() !!}

@endsection
