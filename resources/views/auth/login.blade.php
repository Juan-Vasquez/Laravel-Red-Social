@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <div class="row">
        <div class="col-md-6 offset-md-3 p-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">Acceso a la app</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('auth.login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Corre electronico</label>
                            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Ingresa tu email">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Contrasena</label>
                            <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Ingresa tu password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Acceder</button>
                            <a href="{{ route('register') }}" class="nav-link text-center">¿No tienes cuenta?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection