@extends('layouts.page')

@section('title')
  Login
@endsection

<link href="{{ asset('css/login.css') }}" rel="stylesheet">

@section('content')

    <form class="form-signin" action="{{ route('login') }}" method="POST" style="margin-bottom: 2em">
        {{ csrf_field() }}
        <div class="text-center">
            <img class="mb-4 te" src="../../../storage/saitamalogo.png" alt="" width="80"><br>
            <h2><b>Saitama<span class="text-danger"><i>Login</i></span></b></a></h3>
        </div>
        <label for="inputEmail" class="sr-only">Dirección e-mail</label>
        <input type="email" id="email" class="form-control" name="email" placeholder="Dirección e-mail" value="{{ old('email') }}"required autofocus>

        @if ($errors->has('email'))

            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>

        @endif

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>

        @if ($errors->has('password'))
                                        
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>

        @endif

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuérdame
            </label>
        </div>
        <button class="btn btn-lg btn-dark btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
        <a class="btn btn-link text-dark text-center" href="{{ route('password.request') }}">
            ¿Olvidaste tu contraseña?
        </a>
    </form>

@stop
