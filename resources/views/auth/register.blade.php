@extends('layouts.app')

@section('title', 'Registrate')

@section('content')

    <div class="row">
        <div class="col-md-6 offset-md-3 p-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">Registrate</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('auth.register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Nombre">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="username">Usuario</label>
                            <input type="username" name="username" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" placeholder="Usuario">
                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Correo electronico</label>
                            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="correo electronico">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Confirme su Contraseña</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
                            <a href="{{ route('login') }}" class="nav-link text-center">¿Ya tienes cuenta?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection