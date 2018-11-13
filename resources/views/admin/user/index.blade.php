@extends('layouts.admin')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/dataTables.min.css') }}">
@endsection

@section('content')

	<div class="row">
		<div class="col">
			<a href="{{ route('admin.users.create') }}" 
				class="btn btn-primary btn-block mb-5 rounded-5">
				Crear usuario

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
							Nombre
						</th>

						<th>
							Correo electrónico
						</th>

						<th>
							Fecha registro
						</th>

						<th class="text-right">
							Opciones
						</th>
					</tr>
				</thead>

				<tbody>
					@foreach( $users as $user )
						<tr class="animated fadeInLeft">
							<td>{{ $user->id }} </td>
							<td><small>{{ $user->nombre }} {{ $user->apellidos }}</small></td>
							<td>{{ $user->email }}</td>
							<td><small>{{ $user->created_at }}</small></td>
							<td>
								<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-outline-primary"
									data-toggle="tooltip" 
									data-placement="top"
									title="Editar" >
									<i class="fa fa-pencil" aria-hidden="true"></i>
								</a>

								<a href="{{ route('admin.users.destroy', $user->id) }}" 
									class="btn btn-outline-danger btn-sm"
									data-toggle="tooltip" 
									data-placement="top"
									title="Eliminar" 
									onclick="event.preventDefault(); return confirm('¿Esta seguro que desea eliminar el elemento?') ? document.getElementById( 'user-{{ $user->id }}' ).submit() : ''">
									<i class="fa fa-trash" aria-hidden="true"></i>
								</a>

								<form id="user-{{ $user->id }}" 
									action="{{ route('admin.users.destroy', $user->id) }}" 
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
