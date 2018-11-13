@extends('layouts.cliente')

@section('content')
	<section class="jumbotron text-white bg-dark text-center p-3">
		<div class="container">
			<h1 class="jumbotron-heading text-uppercase">
				
				<small>
					Tus prestamos
				</small>
			</h1>
		</div>
	</section>

	<div class="card card-default">
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>
							ID
						</th>

						<th class="text-center">
							Fecha de retiro
						</th>

						<th class="text-center">
							Estado
						</th>

						<th>
							Fecha de devolución
						</th>

						<th>
							Nota
						</th>

						<th class="text-right">
							Opciones
						</th>
					</tr>
				</thead>

				<tbody>
					@foreach( $prestamos as $prestamo )
						<tr>
							<td><small class="badge">{{ $prestamo->id }}</small></td>

							<td class="text-center"><small class="badge">{{ $prestamo->created_at }}</small></td>

							<td class="text-center">
								<small class="badge">
									@if( $prestamo->fecha_devolucion == null )
										<span class="text-danger">No entregado</span>
									@else
										<span class="text-success">Entregado</span>
									@endif	
								</small>
							</td>

							<td><small class="badge">{{ $prestamo->fecha_devolucion }}</small></td>
							<td><small class="badge">{{ $prestamo->nota }}</small></td>

							<td>
								<a href="{{ route('user.prestamos.show', $prestamo->id) }}" 
									class="btn btn-sm btn-outline-success"
									data-toggle="tooltip" 
									data-placement="top"
									title="Ver reporte del prestamo" >
									Ver reporte
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection