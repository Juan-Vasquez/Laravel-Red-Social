@extends('layouts.app')

@section('title', $user->name)

@section('content')
	
	<section class="row">
		<div class="imagen">
			<img src="{{ route('config.avatar', $user->image) }}" class="img-thumbnail">
		</div>
		<div class="datos-perfil">
			<h2>{{ $user->name }}</h2>
		</div>
		<div class="datos-username">
			<h4>{{ '@'.$user->username }}</h4>
		</div>
	</section>

	<hr>

	<section class="row justify-content-center">
		<div class="col-md-8">
		@foreach($user->Image as $image)
			<div class="card">
				<div class="toast m-3">

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
		</div>
	</section>

@endsection