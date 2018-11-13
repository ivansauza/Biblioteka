@extends('layouts.admin')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/dataTables.min.css') }}">
@endsection

@section('content')
	<div class="row">
		<div class="col">
			<a href="{{ route('admin.devoluciones.create') }}" 
				class="btn btn-primary btn-block mb-5 rounded-5">
				
				Crear devolución

			</a>
		</div>
	</div>

	<div class="">
		<div class="table-responsive">
			<table class="table" id="myTable">
				<thead>
					<tr>
						<th>
							ID prestamo
						</th>

						<th>
							Usuario
						</th>

						<th>
							Fecha prestamo
						</th>

						<th class="text-center">
							Fecha devolución
						</th>

						<th class="text-center">
							nota
						</th>

						<th class="text-right">
							Estado
						</th>
					</tr>
				</thead>

				<tbody>
					@foreach( $prestamos as $prestamo )
						<tr class="animated fadeInLeft">
							<td>{{ $prestamo->id }}</td>
							<td>{{ $prestamo->user->nombre }} {{ $prestamo->user->apellidos }}</td>
							<td><small>{{ $prestamo->created_at }}</small></td>
							<td><small>{{ $prestamo->fecha_devolucion }}</small></td>
							<td>{{ $prestamo->nota }}</td>
							<td class="text-center"><small class="badge">
								@if( $prestamo->fecha_devolucion == null )
									<span class="text-danger">No devuelto</span>
								@else
									<span class="text-success">Entregado</span>
								@endif
							</small></td>
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
