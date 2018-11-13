@extends('layouts.admin')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/dataTables.min.css') }}">
@endsection


@section('content')

	<section class="jumbotron text-white bg-dark text-center p-3">
		<div class="container">
			<h3 class="jumbotron-heading text-uppercase">
				INVENTARIO ->
				<small>
					{{ $inventario->biblioteca->nombre }}
				</small>
			</h3>
		</div>
	</section>

	<a href="{{ route('admin.inventarios') }}" class="btn btn-warning btn-block mb-5">
		Regresar
	</a>

	<p class="text-center"><span class="text-primary">E: Existencia</span> | <span class="text-danger">P: Prestados</span> | <span class="text-success">D: Disponibles</span></p>

	<table class="table table-striped table-dark table-hover" id="myTable">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Titulo</th>
				<th scope="col">ISBN</th>
				<th scope="col">Editorial</th>
				<th scope="col">Existencia</th>
			</tr>
		</thead>
		<tbody>
			@foreach($inventario->libros as $libro)
				<tr>
					<th scope="row">{{ $libro->id }}</th>
					<td><small>{{ $libro->titulo }}</small></td>
					<td><small>{{ $libro->isbn }}</small></td>
					<td><small>{{ $libro->editorial->nombre }}</small></td>
					<td>
						<small>
							<strong class="text-primary">E</strong> {{ $libro->existencia }} | 
							<strong class="text-danger">P</strong> {{ $libro->getPrestados() }} | 
							<strong class="text-success">D</strong> {{ $libro->getDisponibles() }}
						</small>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection


@section('javascript')
	<script type="text/javascript" src="{{ asset('js/dataTables.min.js') }}"></script>
@endsection

@section('script')
	$(document).ready( function () {
		$('#myTable').DataTable();
	} );
@endsection