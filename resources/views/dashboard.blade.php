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
                            <a href="{{ route('imagen.detalle', $image->id) }}" >
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
                                <!-- Sistema de likes -->
                                <?php $likes = false; ?>
                                @foreach ($image->like as $item)
                                    @if ($item->fk_users == Auth::user()->id)
                                        <?php $likes = true; ?>
                                    @endif
                                @endforeach

                                @if ($likes)
                                    <img src="{{ asset('img/heart-red.png') }}" class="btn-dislike" data-id="{{ $image->id }}"> {{ count($image->like) }}
                                @else
                                    <img src="{{ asset('img/heart-black.png') }}" class="btn-like" data-id="{{ $image->id }}"> {{ count($image->like) }}
                                @endif
                                <!-- ------------------------------------------------ -->
                            </div>
                            <div class="coments">
                                <a href="{{ route('imagen.detalle', $image->id) }}" class="btn btn-warning btn-sm">
                                    Comentarios ({{ count($image->coment) }})
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