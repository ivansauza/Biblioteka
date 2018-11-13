@extends('layouts.admin')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/dataTables.min.css') }}">
@endsection

@section('content')
	<div class="row">
		<div class="col">
			<a href="{{ route('admin.editoriales.create') }}" 
				class="btn btn-primary mb-5 btn-block rounded-5">
				Crear Editorial

			</a>
		</div>
	</div>

	@if($errors->any())
		<div class="alert alert-danger" role="alert">
		  {{ $errors->first() }}
		</div>
	@endif


	<div class="">
		<div class="table-responsive">
			<table class="table table-hover" id="myTable">
				<thead>
					<tr>
						<th>
							ID
						</th>

						<th>
							Nombre
						</th>

						<!--
						<th>
							Direccion
						</th>

						<th>
							Telefono
						</th>
						-->

						<th class="text-center">
							Opciones
						</th>
					</tr>
				</thead>

				<tbody>
					@foreach( $editoriales as $editorial )
						<tr class="animated fadeInLeft">
							<td>{{ $editorial->id }}</td>
							<td>{{ $editorial->nombre }}</td>
							<!--
							<td>{{ $editorial->direccion }}</td>
							<td>{{ $editorial->telefono }}</td>
							-->

							<td>
								<a href="{{ route('admin.editoriales.edit', $editorial->id) }}" 
									data-toggle="tooltip" 
									data-placement="top"
									title="Editar" 
									class="btn btn-sm btn-outline-primary">
									Editar
								</a>

								<a href="{{ route('admin.editoriales.destroy', $editorial->id) }}" 
									class="btn btn-outline-danger btn-sm"
									data-toggle="tooltip" 
									data-placement="top"
									title="Eliminar" 
									onclick="event.preventDefault(); return confirm('¿Esta seguro que desea eliminar el elemento?') ? document.getElementById( 'editorial-{{ $editorial->id }}' ).submit() : ''">
									Eliminar
								</a>

								<form id="editorial-{{ $editorial->id }}" 
									action="{{ route('admin.editoriales.destroy', $editorial->id) }}" 
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