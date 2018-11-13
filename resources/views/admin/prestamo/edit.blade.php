@extends('layouts.admin')

@section('content')

	<section class="jumbotron text-white bg-dark text-center p-3">
		<div class="container">
			<h3 class="jumbotron-heading text-uppercase">
				<small>
					Editar prestamo
				</small>
			</h3>
		</div>
	</section>


	{{ Form::model( $prestamo, ['route' => ['admin.prestamos.update', $prestamo->id]] ) }}
		@include('admin.prestamo.form')

			<div class="btn-group float-right mt-3">
				<a href="{{ route('admin.prestamos') }}" 
					class="btn btn-secondary">
					Regresar
				</a>

				{{ Form::submit( 'Actualizar', [ 'class' => 'btn btn-success' ] ) }}
			</div>
	{{ Form::close() }}

@endsection
