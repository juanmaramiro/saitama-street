@extends('layouts.page')

@section('title')
  Registro
@endsection

<link href="{{ asset('css/register.css') }}" rel="stylesheet">

@section('content')

    <form class="form-signin" action="{{ route('register') }}" method="POST" style="margin-bottom: 2em">
        {{ csrf_field() }}
        <div class="text-center">
            <img class="mb-4 te" src="../../../storage/saitamalogo.png" alt="" width="80"><br>
            <h2><b>Saitama<span class="text-danger"><i>Register</i></span></b></a></h3>
        </div>
        <label for="name" class="sr-only">Name</label>
        <input id="name" type="text" class="form-control" name="name" placeholder="Nombre de usuario" required autofocus>

        @if ($errors->has('name'))
                                    
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>

        @endif

        <label for="inputEmail" class="sr-only">Dirección e-mail</label>
        <input type="email" id="email" class="form-control" name="email" placeholder="Dirección e-mail" value="{{ old('email') }}" required>

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

        <label for="password-confirm" class="sr-only">Confirma Password</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirma password" required>

        <button class="btn btn-lg btn-dark btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Registro</button>
    </form>

@stop
