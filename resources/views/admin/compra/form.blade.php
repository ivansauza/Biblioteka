@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/bootstrap-select.min.css') }}">
@endsection

<div class="form-row mb-1">
	<div class="form-group col">
		{{ Form::label( 'biblioteca_id', 'Sucursal' ) }}

		{{ Form::select( 'biblioteca_id', $sucursales, Request::input('sucursal'), [ 'class' => 'form-control', 'placeholder' => 'Seleccione el sucursal' ] ) }}

		@if ($errors->has('biblioteca_id'))
			<span class="badge badge-danger animated fadeInUp mt-2">{{ $errors->first('biblioteca_id') }}</span>
		@endif
	</div>

	<div class="form-group col">
		{{ Form::label( 'proveedor_id', 'Proveedor' ) }}

		{{ Form::select( 'proveedor_id', $proveedores, Request::input('proveedor'), [ 'class' => 'form-control', 'placeholder' => 'Seleccione el proveedor' ] ) }}

		@if ($errors->has('proveedor_id'))
			<span class="badge badge-danger animated fadeInUp mt-2">{{ $errors->first('proveedor_id') }}</span>
		@endif
	</div>

	<div class="form-group col">
		{{ Form::label( 'total', 'Total' ) }}

		<div class="input-group">
			 <div class="input-group-prepend">
				<span class="input-group-text">$</span>
			</div>

			{{ Form::text( 'total', null, [ 'class' => 'form-control text-center', 'placeholder' => '0.00' ] ) }}

			 <div class="input-group-append">
				<span class="input-group-text">MXN</span>
			</div>
		</div><!-- End .input-group -->

		@if ($errors->has('total'))
			<span class="badge badge-danger animated fadeInUp mt-2">{{ $errors->first('total') }}</span>
		@endif
	</div>
</div>

<div class="form-group">
	{{ Form::label( 'observaciones', 'Observaciones' ) }}

	{{ Form::textarea( 'observaciones', null, [ 'class' => 'form-control' ] ) }}
</div>