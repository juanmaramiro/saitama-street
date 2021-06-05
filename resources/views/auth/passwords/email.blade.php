@extends('layouts.page')

@section('title')
  Recuperar contraseña
@endsection

<link href="{{ asset('css/login.css') }}" rel="stylesheet">

@section('content')

    <form class="form-signin" action="{{ route('password.email') }}" method="POST" style="margin-bottom: 2em">
        {{ csrf_field() }}
        <div class="text-center">
            <img class="mb-4 te" src="../../../storage/saitamalogo.png" alt="" width="80"><br>
            <h2><b>Saitama<span class="text-danger"><i>Reset</i></span></b></a></h3>
        </div>
        <label for="inputEmail" class="sr-only">Dirección e-mail</label>
        <input type="email" id="email" class="form-control" name="email" placeholder="Dirección e-mail" value="{{ old('email') }}" style="border-radius: 2px" required autofocus>

        @if ($errors->has('email'))

            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>

        @endif

        <button class="btn btn-lg btn-dark btn-block" style="margin-top: 1em" type="submit"><i class="fas fa-envelope"></i> Reset</button>
    </form>

@stop
