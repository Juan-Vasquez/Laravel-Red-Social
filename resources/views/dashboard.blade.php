@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($images as $image)
                <div class="card">
                    <div class="toast m-3">
                        <div class="toast-header">
                            <img src="{{ route('config.avatar', $image->user->image)}}" class="rounded mr-2" width="35" height="35">
                            <a href="{{ route('imagen.detalle', ['id'=>$image->id]) }}" >
                                <strong class="mr-auto">{{$image->user->name.' |' }}</strong>
                                <small>{{ '@'.$image->user->username }}</small>
                            </a>
                        </div>
                        <hr>
                        <div class="toast-body">
                            <div class="img-rounded">
                                <a href="{{ route('imagen.detalle', $image->id) }}">
                                <img src="{{ route('imagen.imagen', $image->image_path) }}">
                                </a>
                            </div>
                            <div class="toast-footer">
                                <span>{{ '@'.$image->user->username.' |' }}<small>{{ ' Hace '.$image->created_at->diffForHumans() }}</small></span>
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
            @endforeach
            <div class="clearfix"></div>
            {{ $images->links() }}
        </div>
    </div>
    
@endsection