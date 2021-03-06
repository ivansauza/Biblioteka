@extends('layouts.admin')

@section('content')

	<section class="jumbotron text-white bg-primary text-center p-3">
		<div class="container">
			<h3 class="jumbotron-heading text-uppercase">
				<small>
					Agregar Compra
				</small>
			</h3>
		</div>
	</section>


	{{ Form::open( ['route' => 'admin.compras.store'] ) }}
		@include('admin.compra.form')

			<div class="btn-group float-right mt-3">
				<a href="{{ route('admin.compras') }}" 
					class="btn btn-secondary">
					Cancelar
				</a>

				{{ Form::submit( 'Almacenar', [ 'class' => 'btn btn-success' ] ) }}
			</div>
	{{ Form::close() }}

@endsection
