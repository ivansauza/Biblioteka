@extends('layouts.admin')

@section('content')

	<section class="jumbotron text-white bg-primary text-center p-3">
		<div class="container">
			<h3 class="jumbotron-heading text-uppercase">
				<small>
					Agregar Editorial
				</small>
			</h3>
		</div>
	</section>


	{{ Form::open( ['route' => 'admin.editoriales.store'] ) }}
		@include('admin.editorial.form')

			<div class="btn-group float-right mt-3">
				<a href="{{ route('admin.editoriales') }}" 
					class="btn btn-secondary">
					Cancelar
				</a>

				{{ Form::submit( 'Almacenar', [ 'class' => 'btn btn-success' ] ) }}
			</div>
	{{ Form::close() }}

@endsection
