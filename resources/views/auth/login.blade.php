@extends('layaout')

@section('content')
    {!! Form::open(['method' => 'POST', 'route' => 'login']) !!}
        {!! Field::email('email') !!}
        {!! Field::password('password') !!}
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">
            Iniciar Sesión
        </button>

        <a class="btn btn-link" href="{{ route('password.request') }}">
            ¿Olvidaste tu contraseña?
        </a>
    {!! Form::close() !!}


@endsection
