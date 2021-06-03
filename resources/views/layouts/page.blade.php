<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/jpg" href="../../../storage/favicon.ico"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Style -->
    <link href="{{ asset('css/page.css') }}" rel="stylesheet">

    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('admin_assets/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <link href="{{asset('admin_assets/css/responsive.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/css/ui.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

        <a class="navbar-brand" href="{{route('getIndex')}}"><img src="../../../storage/saitamalogo.png" width="37" class="d-inline-block align-top " alt=""> <b>Saitama<span class="text-danger"><i>Street</i></span></b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link text-light" href="#">Catálogo</a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="dropdown01">
                        <a class="dropdown-item bg-dark" style="color: #EEECEB" href="{{route('getCatalogue', ['name' => 'figuras'])}}">Figuras</a>
                        <a class="dropdown-item bg-dark" style="color: #EEECEB" href="{{route('getCatalogue', ['name' => 'camisetas'])}}">Camisetas</a>
                        <a class="dropdown-item bg-dark" style="color: #EEECEB" href="{{route('getCatalogue', ['name' => 'funko-pop'])}}">Funko Pop!</a>
                        <a class="dropdown-item bg-dark" style="color: #EEECEB" href="{{route('getCatalogue', ['name' => 'tazas'])}}">Tazas</a>
                        <a class="dropdown-item bg-dark" style="color: #EEECEB" href="{{route('getCatalogue', ['name' => 'fundas'])}}">Fundas Móvil</a>
                        <a class="dropdown-item bg-dark" style="color: #EEECEB" href="{{route('getCatalogue', ['name' => 'peluches'])}}">Peluches</a>
                        <a class="dropdown-item bg-dark" style="color: #EEECEB" href="{{route('getCatalogue', ['name' => 'mascarillas'])}}">Mascarillas</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-light" href="#">Colecciones</a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="dropdown01">
                        <a class="dropdown-item bg-dark" style="color: #EEECEB" href="{{route('getCollection', ['category' => 'final-fantasy'])}}">Final Fantasy</a>
                        <a class="dropdown-item bg-dark" style="color: #EEECEB" href="{{route('getCollection', ['category' => 'dragon-ball'])}}">Dragon Ball</a>
                        <a class="dropdown-item bg-dark" style="color: #EEECEB" href="{{route('getCollection', ['category' => 'harry-potter'])}}">Harry Potter</a>
                        <a class="dropdown-item bg-dark" style="color: #EEECEB" href="{{route('getCollection', ['category' => 'star-wars'])}}">Star Wars</a>
                        <a class="dropdown-item bg-dark" style="color: #EEECEB" href="{{route('getCollection', ['category' => 'marvel'])}}">Marvel</a>
                        <a class="dropdown-item bg-dark" style="color: #EEECEB" href="{{route('getCollection', ['category' => 'dc-comics'])}}">DC Comics</a>
                        <a class="dropdown-item bg-dark" style="color: #EEECEB" href="{{route('getCollection', ['category' => 'cine'])}}">Cine</a>
                        <a class="dropdown-item bg-dark" style="color: #EEECEB" href="{{route('getCollection', ['category' => 'gaming'])}}">Gaming</a>
                        <a class="dropdown-item bg-dark" style="color: #EEECEB" href="{{route('getCollection', ['category' => 'assassins-creed'])}}">Assassin's Creed</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{route('contact')}}">Contacto</a>
                </li>
            </ul>
            <ul class="navbar-nav">

                @guest

                <li class="navbar-item"><a class="nav-link text-light" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                <li class="navbar-item"><a class="nav-link text-light" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Register</a></li>

                @else

                @php
                $cartItems = DB::table('carts')
                    ->where('cart_user_id', '=', Auth::user()->id)
                    ->count('cart_product_id');
                @endphp

                <li class="navbar-item"><a class="nav-link text-light" href="{{ route('cart') }}"><i class="fas fa-shopping-cart"></i> ({{$cartItems}})</a>
                <li class="navbar-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="../../../storage/users_avatar/{{ Auth::user()->avatar }}" alt="{{Auth::user()->name }}" width="19" style="border-radius: 10px"/>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="dropdown01">

                        @if(Auth::user()->admin == 1)

                        <a class="dropdown-item bg-dark" style="color: #EEECEB" href="{{ route('admin') }}">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>

                        @else

                        <a class="dropdown-item bg-dark" style="color: #EEECEB" href="{{ route('home') }}">
                            <i class="fas fa-user"></i> Perfil
                        </a>

                        @endif

                        <a class="dropdown-item bg-dark" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: #EEECEB" href="">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>

                @endif

            </ul>
        </div>
    </nav>

        @yield('content')

    <!-- Footer -->
    <footer class="page-footer font-small bg-dark">
        <div class="color-primary bg-danger">
            <div class="container">
                <!-- Grid row-->
                <div class="row py-4 d-flex align-items-center">
                    <!-- Grid column -->
                    <div class="col-md-6 col-lg-5 text-center text-light text-md-left mb-4 mb-md-0">
                        <h6 class="mb-0">¡Síguenos en nuestras redes sociales!</h6>
                    </div>
                    <!-- Grid column -->
                    <div class="col-md-6 col-lg-7 text-center text-md-right">
                        <!-- Facebook -->
                        <a class="fb-ic text-light" href="#">
                            <i class="fab fa-facebook-f white-text mr-4"> </i>
                        </a>
                        <!-- Twitter -->
                        <a class="tw-ic text-light" href="#">
                            <i class="fab fa-twitter white-text mr-4"> </i>
                        </a>
                        <!-- Google +-->
                        <a class="gplus-ic text-light" href="#">
                            <i class="fab fa-google-plus-g white-text mr-4"> </i>
                        </a>
                        <!--Linkedin -->
                        <a class="li-ic text-light" href="#">
                            <i class="fab fa-linkedin-in white-text mr-4"> </i>
                        </a>
                        <!--Instagram-->
                        <a class="ins-ic text-light" href="#">
                            <i class="fab fa-instagram white-text"> </i>
                        </a>
                    </div>
                    <!-- Grid column -->
                </div>
            <!-- Grid row-->
            </div>
        </div>

        <!-- Footer Links -->
        <div class="container text-center text-md-left pt-4 pt-md-5">
            <!-- Grid row -->
            <div class="row mt-1 mt-md-0 mb-4 mb-md-0">
                <!-- Grid column -->
                <div class="col-md-3 mx-auto mt-3 mt-md-0 mb-0 mb-md-4">
                    <!-- Links -->
                    <h5 class="text-danger">Sobre mi</h5>
                    <hr class="color-primary mb-4 mt-0 d-inline-block mx-auto w-60">

                    <p class="foot-desc mb-0 text-justify text-light">Mi nombre es Juanma, tengo 28 años y he realizado esta tienda virtual como proyecto final del ciclo de Grado Superior Desarrollo de Aplicaciones Web (DAW)</p>
                </div>
                <!-- Grid column -->
                <hr class="clearfix w-100 d-md-none">
                <!-- Grid column -->
                <div class="col-md-3 mx-auto mt-3 mt-md-0 mb-0 mb-md-4">
                    <!-- Links -->
                    <h5 class="text-danger">Top Ventas</h5>
                    <hr class="color-primary mb-4 mt-0 d-inline-block mx-auto w-60">

                    <ul class="list-unstyled foot-desc">
                        <li class="mb-2">
                            <a href="#!" class="text-light">Final Fantasy</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-light">Marvel</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-light">Harry Potter</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-light">Gaming</a>
                        </li>
                    </ul>
                </div>
                <!-- Grid column -->
                <hr class="clearfix w-100 d-md-none">
                <!-- Grid column -->
                <div class="col-md-3 mx-auto mt-3 mt-md-0 mb-0 mb-md-4">
                    <!-- Links -->
                    <h5 class="text-danger">Links de interés</h5>
                    <hr class="color-primary mb-4 mt-0 d-inline-block mx-auto w-60">

                    <ul class="list-unstyled foot-desc">
                        <li class="mb-2">

                            @guest

                            <a href="{{ route('login') }}" class="text-light"><i class="fas fa-sign-in-alt text-danger"></i> Login</a>

                            @else

                                @if(Auth::user()->admin == 1)

                                <a href="{{ route('admin') }}" class="text-light"><i class="fas fa-user text-danger"></i> Perfil</a>

                                @else

                                <a href="{{ route('home') }}" class="text-light"><i class="fas fa-user text-danger"></i> Perfil</a>

                                @endif
                            
                            @endif

                        </li>
                        <li class="mb-2">
                            <a href="https://www.scalefast.com/" class="text-light"><i class="far fa-building text-danger"></i> Web empresa</a>
                        </li>
                        <li class="mb-2">
                            <a href="https://www.educa2.madrid.org/web/centro.ies.lagunadejoatzel.getafe" class="text-light"><i class="fas fa-building text-danger"></i> Web instituto</a>
                        </li>
                        <li class="mb-2">
                            <a href="https://github.com/juanmaramiro/" class="text-light"><i class="fab fa-github text-danger"></i> Mi perfil Github</a>
                        </li>
                    </ul>
                </div>
                <!-- Grid column -->
                <hr class="clearfix w-100 d-md-none">
                <!-- Grid column -->
                <div class="col-md-3 mx-auto mt-3 mt-md-0 mb-0 mb-md-4">
                    <!-- Links -->
                    <h5 class="text-danger">Contacto</h5>
                    <hr class="color-primary mb-4 mt-0 d-inline-block mx-auto w-60">

                    <ul class="list-unstyled foot-desc">
                        <li class="mb-2 text-light">
                            <i class="fas fa-map-marker-alt text-danger"></i> Avenida Vascongadas, S/N
                        </li>
                        <li class="mb-2 text-light">
                            <i class="far fa-map text-danger"></i> Getafe (Madrid)
                        </li>
                        <li class="mb-2 text-light">
                            <i class="fas fa-phone text-danger"></i> 916 83 20 26
                        </li>
                        <li class="mb-2 text-light">
                            <i class="fas fa-envelope text-danger"></i> admin@saitamastreet.com
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3 text-light">
            <a class="navbar-brand" href="{{route('getIndex')}}"><img src="../../../storage/saitamalogo.png" width="33" class="d-inline-block align-top " alt=""> <b><span class="text-light">Saitama</span><span class="text-danger"><i>Street</i></span></b></a><br>
            <span class="text-light">© 2021 Juan Manuel Ramiro</span>
        </div>
        <!-- Copyright -->

    </footer>

    <!-- Jquery JS-->
    <script src="{{asset('admin_assets/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('admin_assets/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
</body>
</html>
