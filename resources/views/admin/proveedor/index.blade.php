@extends('layouts.admin')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/dataTables.min.css') }}">
@endsection

@section('content')
	<div class="row">
		<div class="col">
			<a href="{{ route('admin.proveedores.create') }}" 
				class="btn btn-primary btn-block mb-5 rounded-5">
				
				Crear proveedor

			</a>
		</div>
	</div>

	@if($errors->any())
		<div class="alert alert-danger" role="alert">
		  {{ $errors->first() }}
		</div>
	@endif


	<div class="">
		<div class="table table-hover table-responsive">
			<table class="table" id="myTable">
				<thead>
					<tr>
						<th>
							ID
						</th>

						<th>
							Nombre
						</th>

						<th>
							Direccion
						</th>

						<th>
							Telefono
						</th>

						<th>
							Pagina web
						</th>

						<th class="text-right">
							Opciones
						</th>
					</tr>
				</thead>

				<tbody>
					@foreach( $proveedores as $proveedor )
						<tr class="animated fadeInLeft">
							<td>{{ $proveedor->id }}</td>
							<td>{{ $proveedor->nombre }}</td>
							<td><small>{{ $proveedor->direccion }}</small></td>
							<td>{{ $proveedor->telefono }}</td>
							<td><small class="badge">{{ $proveedor->pagina_web }}</small></td>

							<td>
								<a href="{{ route('admin.proveedores.edit', $proveedor->id) }}" 
									data-toggle="tooltip" 
									data-placement="top"
									title="Editar" 
									class="btn btn-sm btn-outline-primary">
									<i class="fa fa-pencil" aria-hidden="true"></i>
								</a>

								<a href="{{ route('admin.proveedores.destroy', $proveedor->id) }}" 
									class="btn btn-outline-danger btn-sm"
									data-toggle="tooltip" 
									data-placement="top"
									title="Eliminar" 
									onclick="event.preventDefault(); return confirm('¿Esta seguro que desea eliminar el elemento?') ? document.getElementById( 'proveedor-{{ $proveedor->id }}' ).submit() : ''">
									<i class="fa fa-trash" aria-hidden="true"></i>
								</a>

								<form id="proveedor-{{ $proveedor->id }}" 
									action="{{ route('admin.proveedores.destroy', $proveedor->id) }}" 
									method="POST" 
									style="display: none;">
									
									{{ csrf_field() }}
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection

@section('javascript')
	<script type="text/javascript" src="{{ asset('js/dataTables.min.js') }}"></script>
@endsection

@section('script')
	$(document).ready( function () {
		$('#myTable').DataTable();
	} );
@endsection