@extends('layouts.admin')

@section('content')

	<section class="jumbotron text-white bg-primary text-center p-3">
		<div class="container">
			<h3 class="jumbotron-heading text-uppercase">
				<small>
					Agregar Inventario
				</small>
			</h3>
		</div>
	</section>


	{{ Form::open( ['route' => 'admin.inventarios.store'] ) }}
		@include('admin.inventario.form')

			<div class="btn-group float-right mt-3">
				<a href="{{ route('admin.inventarios') }}" 
					class="btn btn-secondary">
					Cancelar
				</a>

				{{ Form::submit( 'Almacenar', [ 'class' => 'btn btn-success' ] ) }}
			</div>
	{{ Form::close() }}

@endsection
