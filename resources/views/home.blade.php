@extends('layouts.page')

@section('title')
    Perfil de {{ Auth::user()->name }}
@stop

<link href="{{ asset('css/home.css') }}" rel="stylesheet">

@section('content')

    <section class="section-content padding-y" style="margin-bottom: 2em">
        <div class="container">
            <div class="row">
                <aside class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-center">Perfil de {{ Auth::user()->name }}</h5>

                            @if(!Auth::user()->avatar)

                                <img src="../../../storage/default-avatar.png" alt="{{Auth::user()->name }}" style="border-radius: 10px" class="img-fluid" max-width="100%" height= "auto"/>

                            @else

                                <img src="../../../storage/users_avatar/{{ Auth::user()->avatar }}" alt="{{Auth::user()->name }}" style="border-radius: 10px" class="img-fluid" max-width="100%" height= "auto"/>

                            @endif

                            <br><br>
                            <form action="{{ route('update.avatar') }}" id="update-avatar" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="file" class="form-control-file" id="avatar" name="avatar" form="update-avatar"accept="image/*">
                                </div>
                            </form>
                            <button type="button" class="btn btn-dark btn-lg btn-block" onclick="event.preventDefault(); document.getElementById('update-avatar').submit();">Editar avatar</button>
                        </div>
                    </div>
                </aside>
                <main class="col-md-9">
                    <div class="panel-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active text-dark" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-home"></i></a>
                                <a class="nav-item nav-link text-dark" id="nav-settings-tab" data-toggle="tab" href="#nav-settings" role="tab" aria-controls="nav-settings" aria-selected="false" title="Edita tus opciones"><i class="fas fa-cog"></i></a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><br>
                                <form>
                                    <div class="mb-3">
                                        <label for="username">Nickname</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control col-md-3" id="username" value="{{Auth::user()->name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email" class="form-control col-md-3" id="email" value="{{Auth::user()->email }}" readonly>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-settings" role="tabpanel" aria-labelledby="nav-settings-tab"><br>    
                                <form class="form-inline" action="{{ route('update.email') }}" id="update-email" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group mx-sm-3 mb-2">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="{{Auth::user()->email}}">
                                    </div>
                                    <button type="submit" class="btn btn-dark mb-2 col-md-3">Editar email</button>
                                </form>
                                <form class="form-inline" action="{{ route('update.password') }}" id="update-password" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group mx-sm-3 mb-2">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Nueva password">
                                    </div>
                                    <button type="submit" class="btn btn-dark mb-2 col-md-3">Editar contraseña</button>
                                </form>
                            </div>
                        </div>
                    </div>   
                </main>
            </div>
        </div>
    </section>

@endsection
