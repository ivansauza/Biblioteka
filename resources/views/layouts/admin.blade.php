
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		 <title>{{ config('app.name', 'Laravel') }}</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('styles/bootstrap4/bootstrap-default.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('styles/font-awesome.min.css') }}">

		<!-- Custom styles for this template -->
		<link href="{{ asset('styles/dashboard.css') }}" rel="stylesheet">

		<link rel="stylesheet" type="text/css" href="{{ asset('styles/animate.css') }}">

		@yield('css')
	</head>

<style type="text/css">
	@yield('style')
</style>
	

	<body>
		<!--
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top flex-md-nowrap p-0 navbar-top">
			<button class="navbar-toggler float-right" 
				type="button" data-toggle="collapse" 
				data-target="#navbarSupportedContent" 
				aria-controls="navbarSupportedContent" 
				aria-expanded="false" 
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>

			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav px-3">
					@yield('content_menu')
				</ul>

				<ul class="navbar-nav ml-auto mr-3">

					<li class="nav-item">
						<a href="{{ route('logout') }}"
							class="nav-link" 
							onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
							<i class="fa fa-sign-out" aria-hidden="true"></i>
							Cerrar sesión

						</a>

						<form id="logout-form" 
							action="{{ route('logout') }}" 
							method="POST" style="display: none;">
							{{ csrf_field() }}

						</form>
					</li>
				</ul>
			</div>
		</nav>
		-->

		<div class="container">
			<div class="row">
				<nav class="navbar col-sm-4 col-md-4 col-lg-3 col-xl-3 d-none d-md-block bg-dark sidebar mt-0">

					<div class="sidebar-sticky">

						<div class="flex-column p-0">
							<div class="card car-default rounded-0 border-right-0 border-left-0 border-top-0 animated flipInX">
								<div class="card-body">
									<div class="row">
										<div class="col-4">
											<img src="{{ asset('images/admin.png') }}" 
												class="img-fuild rounded-circle border border-primary" 
												style="max-width: 80px;">
										</div>

										<div class="col">
											<h3>
												<small>
													{{ \Auth::guard('admin')->user()->nombre . ' ' . \Auth::guard('admin')->user()->apellidos }}
												</small>
											</h3>

											<p>
												<small>
													Administrador
												</small>
											</p>

											<a href="{{ route('home') }}" class="badge badge-block btn-primary">Inicio</a>
											<a href="{{ route('logout') }}" class="badge badge-block btn-danger btn-sm" 
												onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
												Cerrar sesión

											</a>

											<form id="logout-form" 
												action="{{ route('logout') }}" 
												method="POST" style="display: none;">
												{{ csrf_field() }}

											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<ul class="nav flex-column">
							<li class="nav-item">
								<a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" 
									href="{{ route('admin.home') }}">
									<i class="fa fa-tachometer" aria-hidden="true"></i> 

									<span class="float-right">
										Inicio
									</span>
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link {{ Request::is(['admin/proveedores', 'admin/proveedores/*']) ? 'active' : '' }}" 
									href="{{ route('admin.proveedores') }}">
									<i class="fa fa-truck" aria-hidden="true"></i> 

									<span class="float-right">
										Proveedores
									</span>
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link {{ Request::is(['admin/compras', 'admin/compras/*']) ? 'active' : '' }}" 
									href="{{ route('admin.compras') }}">
									<i class="fa fa-credit-card" aria-hidden="true"></i> 

									<span class="float-right">
										Compras
									</span>
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link {{ Request::is(['admin/inventarios', 'admin/inventarios/*']) ? 'active' : '' }}" 
									href="{{ route('admin.inventarios') }}">
									<i class="fa fa-cubes" aria-hidden="true"></i> 

									<span class="float-right">
										Inventarios
									</span>
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link {{ Request::is(['admin/editoriales', 'admin/editoriales/*']) ? 'active' : '' }}" 
									href="{{ route('admin.editoriales') }}">
									<i class="fa fa-university" aria-hidden="true"></i> 

									<span class="float-right">
										Editoriales
									</span>
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link {{ Request::is(['admin/libros', 'admin/libros/*']) ? 'active' : '' }}" 
									href="{{ route('admin.libros') }}">
									<i class="fa fa-book" aria-hidden="true"></i> 

									<span class="float-right">
										Libros
									</span>
								</a>
							</li>

							<hr />

							<li class="nav-item">
								<a class="nav-link {{ Request::is(['admin/prestamos', 'admin/prestamos/*']) ? 'active' : '' }}" 
									href="{{ route('admin.prestamos') }}">
									<i class="fa fa-hand-o-right" aria-hidden="true"></i>

									<span class="float-right">
										Prestamos
									</span>
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link {{ Request::is(['admin/devoluciones', 'admin/devoluciones/*']) ? 'active' : '' }}" 
									href="{{ route('admin.devoluciones') }}">
									<i class="fa fa-hand-o-left" aria-hidden="true"></i> 

									<span class="float-right">
										Devoluciones
									</span>
								</a>
							</li>

							<hr />

							<li class="nav-item">
								<a class="nav-link {{ Request::is(['admin/empleados', 'admin/empleados/*']) ? 'active' : '' }}" 
									href="#">
									<i class="fa fa-user-secret" aria-hidden="true"></i> 

									<span class="float-right">
										Empleados
									</span>
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link {{ Request::is(['admin/usuarios', 'admin/usuarios/*']) ? 'active' : '' }}" 
									href="{{ route('admin.users') }}">
									<i class="fa fa-users" aria-hidden="true"></i> 

									<span class="float-right">
										Usuarios
									</span>
								</a>
							</li>


						</ul>
<!--
						<ul class="nav flex-column mt-4">
							<li class="nav-item">
								<a class="nav-link {{ Request::is(['usuario', 'usuario/*']) ? 'active' : '' }}" 
									href="">
									<i class="fa fa-user pull-right" aria-hidden="true"></i> 
									Usuario

								</a>
							</li>
						</ul>
-->
						<ul class="nav flex-column mt-4">
							<!--
							<li class="nav-item">
								<a class="nav-link {{ Request::is(['usuario', 'usuario/*']) ? 'active' : '' }}" 
									href="">
									<i class="fa fa-university pull-right" aria-hidden="true"></i> 
									Sucursales

								</a>
							</li>


							<li class="nav-item">
								<a class="nav-link {{ Request::is(['usuario', 'usuario/*']) ? 'active' : '' }}" 
									href="">
									<i class="fa fa-user-secret pull-right" aria-hidden="true"></i> 
									Administradores

								</a>
							</li>
							-->
						</ul>
					</div>
				</nav>

				<main role="main" class="col-md-8 ml-sm-auto col-lg-9 pt-3 px-4 mb-5">
					@yield('content')
				</main>
			</div>
		</div>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="{{ asset('js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/popper.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap-4.min.js') }}"></script>

		@yield('javascript')

		<script>
			var _token = '{{ csrf_token() }}';

			$( document ).ready( function()
			{
				$('[data-toggle="tooltip"]').tooltip();

				@yield('script')
			} )
		</script>
		
	</body>
</html>
