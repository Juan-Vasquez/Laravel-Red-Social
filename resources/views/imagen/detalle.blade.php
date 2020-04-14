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

                                @if (Auth::user()->id == $image->user->id)
                                <div class="buttons">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger" id="eliminar-imagen" >Eliminar</button>
                                        <button class="btn btn-success" id="actualizar-imagen">Actualizar</button>
                                    </div>
                                </div>

                                 <!-- Modal para eliminar Imagen -->
                                 <div class="modal py-5 modal-imagen" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        
                                        <div class="modal-body">
                                            <button type="button" id="close-imagen-modal" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            <p>Esta seguro que quiere eliminarlo</p>
                                        </div>
                                        <div class="modal-footer">
                                          <a href="{{ route('imagen.delete', $image->id) }}" type="button" class="btn btn-primary">Eliminar</a>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <!-- --------------------------------- -->
                                <!-- Modal para Actualizar la imagen -->
                                    <div class="modal py-5 actualizar-modal-imagen" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <button type="button" id="close-actualizar-imagen" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form method="POST" action="{{ route('imagen.update') }}" enctype="multipart/form-data">

                                                        @csrf
                                                        <input type="hidden" name="image_id" value="{{ $image->id }}">
                                                        <div class="form-group row">
                                                            <label for="descripcion" class="col-md-3 col-form-label text-md-right">Descripcion</label>
                                                            <div class="col-md-6">
                                                                <textarea type="text" name="descripcion" id="descripcion" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-6 offset-md-3">
                                                                <button type="submit" class="btn btn-primary">Actualizar Datos</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <!-- --------------------------------- -->

                                @endif
                                
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
                                                <a type="button" class="ml-2 mb-1 close" id="open-modal" data-dismiss="toast" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </a>

                                                <!-- Modal para eliminar comentario -->
                                                <div class="modal py-5" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        
                                                        <div class="modal-body">
                                                            <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                              </button>
                                                          <p>Esta seguro que quiere eliminarlo</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                          <a href="{{ route('coment.delete', $coment->id) }}" type="button" class="btn btn-primary">Eliminar</a>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                                <!-- --------------------------------- -->

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