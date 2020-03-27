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

                            <!-- Sistema de likes -->
                            <div class="likes">

                                <?php 
                                    $likes = false;
                                ?>

                                @foreach($image->like as $item)
                                    @if ($item->fk_users == Auth::user()->id)
                                        <?php 
                                            $likes = true;
                                        ?>
                                    @endif
                                @endforeach

                                @if ($likes)
                                    <img src="{{ asset('img/heart-red.png') }}" class="btn-dislike" data-id="{{ $image->id }}">
                                @else
                                    <img src="{{ asset('img/heart-black.png') }}" class="btn-like" data-id="{{ $image->id }}"> 
                                @endif
                                <span class="t-likes">{{ count($image->like) }}</span>

                            </div>
                            <!-- ----------------------- -->

                            <div class="coments">
                                <h3>
                                    Comentarios ({{ count($image->coment) }})
                                </h3>
                                <hr>

                                <!-- Agregar comentario -->
                                <form method="POST" action="{{ route('coment.save') }}" >
                                    @csrf
                                    <input type="hidden" name="imagen" value="{{ $image->id }}">
                                    <p>
                                        <textarea type="text" name="content" class="form-control"></textarea>
                                    </p>
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </form>

                                <!-- Vista de comentarios -->
                                @foreach ($image->coment as $coment)
                                    <div class="toast-footer comentarios shadow">
                                        <img src="{{ route('config.avatar', $coment->user->image) }}" class="rounded mr-2" width="35" height="35">
                                        <strong>
                                            {{ '@'.$coment->user->username.' |' }}<small>{{ ' Hace '.$coment->created_at->diffForHumans() }}</small>
                                            @if (Auth::check() && ($coment->fk_users == Auth::user()->id || $coment->image->fk_users == Auth::user()->id ))
                                                <a href="{{ route('coment.delete', $coment->id) }}" type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </a>
                                            @endif
                                        </strong>
                                        <p>{{ $coment->content }}</p>
                                    </div>
                               @endforeach
                               
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
    
@endsection