@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/bootstrap-select.min.css') }}">
@endsection
<!--
<div class="form-group">
	{{ Form::label( 'fecha_tramite', 'Fecha de tramite' ) }}
	
	{{ Form::text( 'fecha_tramite', null, [ 'class' => 'form-control', 'disabled', 'placeholder' => 'La fecha se inserta automaticamente.' ] ) }}

	@if ($errors->has('fecha_tramite'))
		<span class="badge badge-danger animated fadeInUp mt-2"><strong>{{ $errors->first('fecha_tramite') }}</strong></span>
	@endif
</div>
-->
<div class="form-group">
	{{ Form::label( 'user_id', 'Usuario' ) }}

	{{ Form::select( 'user_id', $users, Request::input('usuario'), [ 'class' => 'form-control selectpicker', 'data-live-search' => 'true', 'placeholder' => 'Seleccione un usuario' ] ) }}

	@if ($errors->has('user_id'))
		<span class="badge badge-danger animated fadeInUp mt-2">{{ $errors->first('user_id') }}</span>
	@endif
</div>

<br />


<div class="form-group">
	{{ Form::label( 'inventario_id', 'Inventario del que se le prestaran libros:' ) }}

	{{ Form::select( 'inventario_id', $inventarios, Request::input('usuario'), [ 'class' => 'form-control selectpicker', 'data-live-search' => 'true', 'placeholder' => 'Seleccione un inventario' ] ) }}

	@if ($errors->has('inventario_id'))
		<span class="badge badge-danger animated fadeInUp mt-2">{{ $errors->first('inventario_id') }}</span>
	@endif
</div>


<div class="form-group">
	{{ Form::label( 'libros', 'Libros' ) }}
	
	{{ Form::select( 'libros[]', $libros, null, [ 'multiple' => true, 'class' => 'form-control selectpicker', 'data-live-search' => 'true' ] ) }}

	<small class="form-text text-muted">Selecciona libros solo de una sucursal.</small>

	@if ($errors->has('libros'))
		<span class="badge badge-danger animated fadeInUp mt-2">{{ $errors->first('libros') }}</span>
	@endif
</div>


<div class="form-group">
	{{ Form::label( 'nota', 'Nota (Opcional) ' ) }}

	{{ Form::textarea( 'nota', null, [ 'class' => 'form-control' ] ) }}
</div>


@section('javascript')
	<script type="text/javascript" src="{{ asset('js/bootstrap-select.min.js') }}"></script>
@endsection