@extends('layouts.admin')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/dataTables.min.css') }}">
@endsection

@section('content')
	<div class="row">
		<div class="col">
			<a href="{{ route('admin.compras.create') }}" 
				class="btn btn-primary mb-5 btn-block rounded-5">
				Agregar compra

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
							Proveedor
						</th>

						<th>
							Sucursal
						</th>

						<th class="text-center">
							Total
						</th>

						<th>
							Fecha de registro
						</th>

						<th>
							Fecha de edicion
						</th>

						<th class="text-right">
							Opciones
						</th>
					</tr>
				</thead>

				<tbody>
					@foreach( $compras as $compra )
						<tr class="animated fadeInLeft">
							<td><small class="badge">{{ $compra->id }}</small></td>
							<td>{{ $compra->proveedor->nombre }}</td>
							<td>{{ $compra->biblioteca->nombre }}</td>
							<td class="text-center"><small class="badge">$ {{ $compra->total }} MXN</small></td>

							<td><small class="badge">{{ $compra->created_at }}</small></td>
							<td><small class="badge">{{ $compra->updated_at }}</small></td>

							<td>
								<!--
								<a href="" 
									class="btn btn-sm btn-success"
									data-toggle="tooltip" 
									data-placement="top"
									title="Ver reporte de compra" >
									<i class="fa fa-eye" aria-hidden="true"></i>
								</a>
								-->

								<a href="{{ route('admin.compras.edit', $compra->id) }}" class="btn btn-sm btn-outline-primary"
									data-toggle="tooltip" 
									data-placement="top"
									title="Editar" >
									<i class="fa fa-pencil" aria-hidden="true"></i>
								</a>

								<a href="{{ route('admin.compras.destroy', $compra->id) }}" 
									class="btn btn-outline-danger btn-sm"
									data-toggle="tooltip" 
									data-placement="top"
									title="Eliminar" 
									onclick="event.preventDefault(); return confirm('¿Esta seguro que desea eliminar el elemento?') ? document.getElementById( 'compra-{{ $compra->id }}' ).submit() : ''">
									<i class="fa fa-trash" aria-hidden="true"></i>
								</a>

								<form id="compra-{{ $compra->id }}" 
									action="{{ route('admin.compras.destroy', $compra->id) }}" 
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