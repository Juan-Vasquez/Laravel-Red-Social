@extends('layouts.app')

@section('content')

    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">Subir nueva Imagen</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('imagen.save') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="imagen_path" class="col-md-3 col-form-label text-md-right">Imagen</label>
                            <div class="col-md-6">
                                <input type="file" id="imagen_path" name="imagen_path" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descripcion" class="col-md-3 col-form-label text-md-right">Descripcion</label>
                            <div class="col-md-6">
                                <textarea type="text" name="descripcion" id="descripcion"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary">Subir Imagen</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection