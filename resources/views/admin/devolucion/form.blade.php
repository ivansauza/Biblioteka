@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/bootstrap-select.min.css') }}">
@endsection

<!--
<div class="form-group">
	{{ Form::label( 'fecha_devolucion', 'Fecha de devolución' ) }}
	
	{{ Form::text( 'fecha_devolucion', null, [ 'class' => 'form-control', 'disabled', 'placeholder' => 'La fecha se insertara automaticamente.' ] ) }}

	@if ($errors->has('fecha_devolucion'))
		<span class="badge badge-danger animated fadeInUp mt-2"><strong>{{ $errors->first('fecha_devolucion') }}</strong></span>
	@endif
</div>
-->

<div class="form-group">
	{{ Form::label( 'prestamo_id', 'Prestamo' ) }}

	{{ Form::select( 'prestamo_id', $prestamos, null, [ 'class' => 'form-control selectpicker', 'data-live-search' => 'true', 'placeholder' => 'Seleccione un prestamo' ] ) }}

	@if ($errors->has('prestamo_id'))
		<span class="badge badge-danger animated fadeInUp mt-2">{{ $errors->first('prestamo_id') }}</span>
	@endif
</div>

<div class="form-group">
	{{ Form::label( 'nota', 'Nota (Opcional) ' ) }}

	{{ Form::textarea( 'nota', null, [ 'class' => 'form-control' ] ) }}
</div>


@section('javascript')
	<script type="text/javascript" src="{{ asset('js/bootstrap-select.min.js') }}"></script>
@endsection