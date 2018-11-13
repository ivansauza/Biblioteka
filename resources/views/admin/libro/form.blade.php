@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/bootstrap-select.min.css') }}">
@endsection

<div class="form-group">
	{{ Form::label( 'titulo', 'Titulo') }}

	{{ Form::text( 'titulo', null, [ 'class' => 'form-control', 'autofocus' ]  ) }}

	@if ($errors->has('titulo'))
		<span class="badge badge-danger animated fadeInUp mt-2">{{ $errors->first('titulo') }}</span>
	@endif
</div>


<div class="form-group">
	{{ Form::label( 'autor', 'Autor') }}

	{{ Form::text( 'autor', null, [ 'class' => 'form-control' ]  ) }}

	@if ($errors->has('autor'))
		<span class="badge badge-danger animated fadeInUp mt-2">{{ $errors->first('autor') }}</span>
	@endif
</div>

<div class="form-row">

	<div class="form-group col">
		{{ Form::label( 'isbn', 'ISBN') }}

		{{ Form::text( 'isbn', null, [ 'class' => 'form-control' ]  ) }}

		@if ($errors->has('isbn'))
			<span class="badge badge-danger animated fadeInUp mt-2">{{ $errors->first('isbn') }}</span>
		@endif
	</div>

	<div class="form-group col">
		{{ Form::label( 'paginas', 'Páginas') }}

		{{ Form::text( 'paginas', null, [ 'class' => 'form-control' ]  ) }}

		@if ($errors->has('paginas'))
			<span class="badge badge-danger animated fadeInUp mt-2">{{ $errors->first('paginas') }}</span>
		@endif
	</div>
</div>

<hr />

<div class="form-row">
	<div class="form-group col">
		{{ Form::label( 'editorial_id', 'Editorial' ) }}

		{{ Form::select( 'editorial_id', $editoriales, Request::input('editorial'), [ 'class' => 'form-control selectpicker', 'data-live-search' => 'true', 'placeholder' => 'Seleccione una editorial' ] ) }}

		@if ($errors->has('editorial_id'))
			<span class="badge badge-danger animated fadeInUp mt-2">{{ $errors->first('editorial_id') }}</span>
		@endif
	</div>

	<div class="form-group col">
		{{ Form::label( 'inventario_id', 'Inventario' ) }}

		{{ Form::select( 'inventario_id', $inventarios, Request::input('inventario'), [ 'class' => 'form-control selectpicker', 'data-live-search' => 'true',  'placeholder' => 'Seleccione un inventario' ] ) }}

		@if ($errors->has('inventario_id'))
			<span class="badge badge-danger animated fadeInUp mt-2">{{ $errors->first('inventario_id') }}</span>
		@endif
	</div>

	<div class="form-group">
		{{ Form::label( 'existencia', 'Existencia') }}

		{{ Form::number( 'existencia', null, [ 'class' => 'form-control', 'min' => '1' ]  ) }}

		@if ($errors->has('existencia'))
			<span class="badge badge-danger animated fadeInUp mt-2">{{ $errors->first('existencia') }}</span>
		@endif
	</div>
</div>



@section('javascript')
	<script type="text/javascript" src="{{ asset('js/bootstrap-select.min.js') }}"></script>
@endsection