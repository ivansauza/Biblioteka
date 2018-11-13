@extends('layouts.admin')

@section('content')

	<section class="jumbotron text-white bg-primary animated fadeInDownBig text-center p-3">
		<div class="container">
			<h3 class="jumbotron-heading text-uppercase">
				<small>
					Editar proveedor
				</small>
			</h3>
		</div>
	</section>


	{{ Form::model( $proveedor, ['route' => ['admin.proveedores.update', $proveedor->id]] ) }}
		@include('admin.proveedor.form')

			<div class="btn-group float-right mt-3">
				<a href="{{ route('admin.proveedores') }}" 
					class="btn btn-secondary">
					Regresar
				</a>

				{{ Form::submit( 'Actualizar', [ 'class' => 'btn btn-success' ] ) }}
			</div>
	{{ Form::close() }}

@endsection
