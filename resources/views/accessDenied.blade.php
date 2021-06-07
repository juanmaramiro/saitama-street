@extends('layouts.page')

@section('title')
    Acceso denegado
@endsection

<link href="{{ asset('css/login.css') }}" rel="stylesheet">

@section('content')

    <form class="form-signin" style="margin-bottom: 2em">
        <div class="text-center">
            <img class="mb-4 te" src="../../../storage/saitamalogo.png" alt="" width="80"><br>
            <h2><b>Acceso<span class="text-danger"><i>Denegado</i></span></b></h3>
        </div>
        <div class="alert alert-danger text-center mb-3">
            <p>A esta página solo puede acceder un usuario registrado o con permisos de administrador.</p>
        </div>
    </form>

@endsection
