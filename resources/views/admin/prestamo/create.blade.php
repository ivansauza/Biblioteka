@extends('layouts.admin')

@section('content')

	<section class="jumbotron text-white bg-dark text-center p-3">
		<div class="container">
			<h3 class="jumbotron-heading text-uppercase">
				<small>
					Crear prestamo
				</small>
			</h3>
		</div>
	</section>

	@if($errors->any())
		<div class="alert alert-danger" role="alert">
		  {{ $errors->first() }}
		</div>
	@endif

	{{ Form::open( ['route' => 'admin.prestamos.store'] ) }}
		@include('admin.prestamo.form')

			<div class="btn-group float-right mt-3">
				<a href="{{ route('admin.prestamos') }}" 
					class="btn btn-secondary">
					Cancelar
				</a>

				{{ Form::submit( 'Almacenar', [ 'class' => 'btn btn-success' ] ) }}
			</div>
	{{ Form::close() }}

@endsection
