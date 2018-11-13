@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="col">
			<a href="{{ route('admin.libros.create') }}" 
				class="btn btn-primary mb-5 btn-block">
				Agregar libro

			</a>
		</div>
	</div>

	@if($errors->any())
		<div class="alert alert-danger" role="alert">
		  {{ $errors->first() }}
		</div>
	@endif


	<div class="row">
	@foreach( $libros as $libro )
		<div class="col-md-6">
			<div class="card text-black bg-light mb-3 animated zoomInDown">
				<div class="card-header">
					<img src="{{ asset('images/libro.png') }}" class="img-fluid">
				</div>

				<div class="card-body">
					<h5 class="card-title text-center">
						{{ $libro->titulo }}						
					</h5>

					<small class="d-block mb-2">
						<strong>ID:</strong> <span class="float-right">{{ $libro->id }}
						</span>
					</small>

					<small class="d-block mb-2">
						<strong>Autor:</strong> <span class="float-right">{{ $libro->autor }}
						</span>
					</small>

					<small class="d-block mb-2">
						<strong>ISBN:</strong> <span class="float-right">{{ $libro->isbn }}
						</span>
					</small>

					<small class="d-block mb-2">
						<strong>Paginas:</strong> <span class="float-right">{{ $libro->paginas }}
						</span>
					</small>

					<small class="d-block mb-2">
						<strong>Existencia:</strong> <span class="float-right">{{ $libro->existencia }}
						</span>
					</small>

					<small class="d-block mb-2">
						<strong>Editorial:</strong> <span class="float-right">{{ $libro->editorial->nombre }}
						</span>
					</small>

					<small class="d-block mb-2">
						<strong>Registro:</strong> <span class="float-right">{{ $libro->created_at }}
						</span>
					</small>

					<small class="d-block mb-2">
						<strong>Edición:</strong> <span class="float-right">{{ $libro->updated_at }}
						</span>
					</small>

					<div class="btn-group btn-group-justified" role="group" aria-label="Basic example">
						<a href="{{ route('admin.libros.edit', $libro->id) }}" 
							class="btn btn-sm btn-primary">
							Editar
						</a>

						<a href="{{ route('admin.libros.destroy', $libro->id) }}" 
							class="btn btn-sm btn-danger"
							onclick="event.preventDefault(); return confirm('¿Esta seguro que desea eliminar el elemento?') ? document.getElementById( 'libro-{{ $libro->id }}' ).submit() : ''">
							Eliminar
						</a>
					</div>

					<form id="libro-{{ $libro->id }}" 
						action="{{ route('admin.libros.destroy', $libro->id) }}" 
						method="POST" 
						style="display: none;">
						
						{{ csrf_field() }}
					</form>
				</div>
			</div>
		</div>
	@endforeach
	</div>

@endsection