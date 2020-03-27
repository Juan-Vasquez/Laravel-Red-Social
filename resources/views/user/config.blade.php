@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-4 m-5">
            @if (session()->has('flash'))
            <div class="alert alert-info">{{ session('flash') }}</div>
        @endif  
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Datos Personales</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> Nombre: <span>{{ Auth::user()->name }}</span></li>
                        <li class="list-group-item">Usuario: <span>{{ Auth::user()->username }}</span></li>
                        <li class="list-group-item">Correo Electronico: <span>{{ Auth::user()->email }}</span></li>
                        <li class="list-group-item">Telefono: <span>{{ Auth::user()->phone }}</span></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4 m-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Configuracion de Datos</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('config.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="name" name="name" placeholder="Nombre" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="username">Usuario</label>
                            <input type="text" name="username" placeholder="usuario" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Correo Electronico</label>
                            <input type="email" name="email" placeholder="correo electronico" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefono</label>
                            <input type="text" name="phone" id="phone" placeholder="Telefono/Celular" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="file">Imagen</label>
                            <input type="file" id="file" name="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection