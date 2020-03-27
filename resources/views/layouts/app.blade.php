<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    <title>@yield('title')</title>

    <!-- Importacion de estilos css -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <!-- Importacion de icon -->
    <link rel="icon" href="{{ asset('img/Instagram-logo.ico') }}">

</head>
<body>

    @if (session()->has('message'))
        <div class="alert alert-info m-3">
            {{ session('message') }}
        </div>
    @endif

    @auth
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a href="{{ route('dashboard.index') }}" class="navbar-brand">Dashboard</a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('dashboard.index') }}" class="nav-link">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('imagen.index') }}" class="nav-link">Subir imagen</a>
                    </li>
                    <li>
                        @if (Auth::user()->image)
                            <div class="img-perfil">
                                <img src="{{ route('config.avatar', Auth::user()->image) }}">
                            </div>
                        @endif
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" href="" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a href="" class="dropdown-item">Mi perfil</a>
                            <a href="{{ route('config') }}" class="dropdown-item">Configuracion</a>
                            <a 
                                href="{{ route('logout') }}" 
                                class="dropdown-item"
                                onclick="event.preventDefault(); document.getElementById('form-logout').submit();"  
                            >Logout</a>
                            <form id="form-logout" method="POST" action="{{ route('logout') }}" style="display: none;">@csrf</form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    @endauth

    <div class="container">
        @yield('content')
    </div>

  <!-- Importacion de JavaScript -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    
</body>
</html>