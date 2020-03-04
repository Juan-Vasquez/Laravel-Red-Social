@extends('layouts.app')

@section('title', 'Detalle Imagen')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card">
                    <div class="toast m-3">
                        <div class="toast-header">
                            <img src="{{ route('config.avatar', $image->user->image)}}" class="rounded mr-2" width="30" height="30">
                            <strong class="mr-auto">{{$image->user->name.' |' }}</strong>
                            <small>{{ '@'.$image->user->username }}</small>
                            <a href="{{ route('dashboard.index') }}" type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                        <hr>
                        <div class="toast-body">
                            <div class="img-rounded">
                                <img src="{{ route('imagen.imagen', $image->image_path) }}">
                            </div>
                            <div class="toast-footer">
                                <span>{{ '@'.$image->user->username }}</span>
                                <p>{{ $image->descripcion }}</p>
                            </div>
                            <div class="likes">
                                <img src="{{ asset('img/heart-black.gif') }}" alt="">
                            </div>
                            <div class="coments">
                                <a href="" class="btn btn-warning btn-sm">
                                    Comentarios ({{ $image->coment }})
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
    
@endsection