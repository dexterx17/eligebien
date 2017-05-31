<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Elige bien') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="{{ asset('css/now.css') }}" rel="stylesheet">
</head>
<body class="index-page">
    <nav class="navbar navbar-toggleable-md bg-primary fixed-top ">
        <div class="container">
            <div class="navbar-translate">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}" rel="tooltip" title="Tu asistente financiero" data-placement="bottom">
                   {{ config('app.name', 'Elige Bien') }}
                </a>
            </div>
           

            <div class="collapse navbar-collapse  justify-content-end" id="navigation">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                        </li>
                    @endif
                </ul>
                <div class="dropdown button-dropdown ">
                    <a href="#pablo" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                        <span class="button-bar"></span>
                        <span class="button-bar"></span>
                        <span class="button-bar"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if (Auth::guest())
                            <a class="dropdown-item" href="{{ route('login') }}">Iniciar Sesión</a>
                            <a class="dropdown-item" href="{{ route('register') }}">Registrarse</a>
                        @else
                            <a class="dropdown-header"> {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            <a class="dropdown-item" href="{{ route('perfil') }}">Perfil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('admin.bancos') }}">Bancos</a>
                            <a class="dropdown-item" href="{{ route('admin.servicios') }}">Servicios</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    @include('partials.footer')
    <!-- Scripts -->
    <script src="{{ asset('js/now.js') }}"></script>
    @yield('js')
</body>
</html>
