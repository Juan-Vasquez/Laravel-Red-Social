@auth
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel" id="fondo-navegacion">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard.index') }}">
                Red Social
            </a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.index') }}">
                        Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.usuarios') }}" class="nav-link">
                        Amigos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('imagen.index') }}">
                        Subir imagen
                    </a>
                </li>
                <li>
                    @if (Auth::user()->image)
                    <div class="img-perfil">
                        <img src="{{ route('config.avatar', Auth::user()->image) }}">
                    </div>
                    @endif
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" id="navbarDropdown" role="button">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu navbar-dropdown">
                        <a class="dropdown-item" href="{{ route('user.perfil', ['user'=>Auth::user()->id]) }}">
                            Mi perfil
                        </a>
                        <a class="dropdown-item" href="{{ route('config') }}">
                            Configuracion
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">
                            Logout
                        </a>
                        <form action="{{ route('logout') }}" id="form-logout" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
@endauth
