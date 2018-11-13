@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('styles/bootstrap-select.min.css') }}">
@endsection


<div class="form-group">
	{{ Form::label( 'biblioteca_id', 'Sucursal' ) }}

	{{ Form::select( 'biblioteca_id', $sucursales, Request::input('sucursal'), [ 'class' => 'form-control', 'placeholder' => 'Seleccione el sucursal' ] ) }}

	@if ($errors->has('biblioteca_id'))
		<span class="badge badge-danger animated fadeInUp mt-2">{{ $errors->first('biblioteca_id') }}</span>
	@endif
</div>
