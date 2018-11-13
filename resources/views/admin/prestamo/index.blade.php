@extends('layouts.admin')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/dataTables.min.css') }}">
@endsection

@section('content')
	<div class="row">
		<div class="col">
			<a href="{{ route('admin.prestamos.create') }}" 
				class="btn btn-primary btn-block mb-5 rounded-5">
				
				Crear prestamo

			</a>
		</div>
	</div>

	<div class="">
		<div class="table-responsive">
			<table class="table table-hover" id="myTable">
				<thead>
					<tr>
						<th>
							ID
						</th>

						<th>
							Usuario
						</th>

						<th>
							Fecha de tramite
						</th>

						<th>
							Nota
						</th>

						<th class="text-center">
							Estado de devolución
						</th>
<!--
						<th class="text-center">
							Fecha de devolución
						</th>
-->
						<th class="text-right">
							Opciones
						</th>
					</tr>
				</thead>

				<tbody>
					@foreach( $prestamos as $prestamo )
						<tr class="animated fadeInLeft">
							<td>{{ $prestamo->id }}</td>
							<td><small>{{ $prestamo->user->nombre }} {{ $prestamo->user->apellidos }}</small></td>
							<td><small>{{ $prestamo->created_at }}</small></td>
							<td><small>{{ $prestamo->nota }}</small></td>

							<td class="text-center"><small class="badge">
								@if( $prestamo->fecha_devolucion == null )
									<span class="text-danger">No devuelto</span>
								@else
									<span class="text-success">Entregado</span>
								@endif
							</small></td>
<!--
							<td>{{ $prestamo->fecha_devolucion }}</td>
-->

							<td>

								@if( $prestamo->fecha_devolucion == null )
									<a href="{{ route('admin.prestamos.edit', $prestamo->id) }}" 
										data-toggle="tooltip" 
										data-placement="top"
										title="Editar" 
										class="btn btn-sm btn-outline-primary mt-2">
										<i class="fa fa-pencil" aria-hidden="true"></i>
									</a>
								@else
								<!--
									<a href="#" 
										data-toggle="tooltip" 
										data-placement="top"
										title="Editar" 
										class="btn btn-sm btn-outline-primary disabled">
										<i class="fa fa-pencil" aria-hidden="true"></i>
									</a>
								-->
								@endif

								@if( $prestamo->fecha_devolucion == null )
									<a href="{{ route('admin.prestamos.destroy', $prestamo->id) }}" 
										class="btn btn-outline-danger btn-sm mt-2"
										data-toggle="tooltip" 
										data-placement="top"
										title="Eliminar" 
										onclick="event.preventDefault(); return confirm('¿Esta seguro que desea eliminar el elemento?') ? document.getElementById( 'prestamo-{{ $prestamo->id }}' ).submit() : ''">
										<i class="fa fa-trash" aria-hidden="true"></i>
									</a>
								@else
								<!--
									<a href="#" 
										data-toggle="tooltip" 
										data-placement="top"
										title="Este prestamo ya no se puede eliminar." 
										class="btn btn-outline-danger btn-sm disabled">
										<i class="fa fa-trash" aria-hidden="true"></i>
									</a>
								-->
								@endif

								<form id="prestamo-{{ $prestamo->id }}" 
									action="{{ route('admin.prestamos.destroy', $prestamo->id) }}" 
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