@extends('layouts.app')

@section('title', 'Amigos | Perfiles')

@section('content')

<div class="py-5">
    <h2 class="card-title">Suscritos a la Red Social</h2>
    <hr>
</div>
<div class="row justify-content-center">
    <div class="col-md-8">
    @foreach($users as $user)
        <div class="card">
            <div class="toast m-3">

                <div class="row">
                    <div class="imagen">
                        <img src="{{ route('config.avatar', $user->image) }}" class="img-thumbnail">
                    </div>
                    <div class="d-flex flex-column align-items-center align-self-center">
                        <div class="datos-perfil">
                            <h2>{{ $user->name }}</h2>
                        </div>
                        <div class="datos-username">
                            <h4>{{ '@'.$user->username }}</h4>
                        </div>
                    </div>
                </div>
                    
            </div>
        </div>
    @endforeach
    <div class="clearfix"></div>
    {{ $users->links() }}
    </div>
</div>

@endsection