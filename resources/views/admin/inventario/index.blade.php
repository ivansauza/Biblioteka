@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="col">
			<a href="{{ route('admin.inventarios.create') }}" 
				class="btn btn-primary mb-5 btn-block rounded-5">
				Crear Inventario

			</a>
		</div>
	</div>

	@if($errors->any())
		<div class="alert alert-danger" role="alert">
		  {{ $errors->first() }}
		</div>
	@endif

	<div class="row">
	@foreach( $inventarios as $inventario )
		<div class="col-md-6">
			<div class="card text-white bg-primary mb-3">
				<div class="card-header">
					Inventario : {{ $inventario->id }}
				</div>

				<div class="card-body">
					<h5 class="card-title">
						Sucursal: {{ $inventario->biblioteca->nombre }}
					</h5>

					<table class="table">
						<thead>
							<tr>
								<th scope="col">Fecha registro</th>
								<th scope="col">Fecha edición</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{{ $inventario-> created_at }}</td>
								<td>{{ $inventario-> updated_at }}</td>
							</tr>
					</table>
				</div>

				<div class="card-footer">
					<a href="{{ route('admin.inventarios.show', $inventario->id) }}" class="btn btn-outline-light btn-block">
						Ver inventario
					</a>
				</div>
			</div>
		</div>
	@endforeach
	</div>


@endsection
