<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get( '/', 'HomeController@index' )
	->name('home');

Route::get( '/home', 'HomeController@index' )
	->name('home');

/* Cliente  */
Route::group(['prefix' => 'usuario'], function()
{
	Route::get( 'login', 'HomeController@login' )
		->name('login')
		->middleware('guest');

	Route::post('login', 'Auth\LoginController@login')
		->name('login.submit');

	Route::get('register', 'HomeController@register')
		->name('register')
		->middleware('guest');

	Route::post('register', 'Auth\RegisterController@register')
		->name('register.submit');

	Route::get('home', 'User\PrestamoController@index')
		->name('user.home');

	Route::get('dashboard', 'User\PrestamoController@index')
		->name('user.home');

	Route::get('prestamos', 'User\PrestamoController@index')
		->name('user.prestamos');

	Route::get('prestamos/{id}', 'User\PrestamoController@show')
		->name('user.prestamos.show');

});


/*  Admin  */
Route::group(['prefix' => 'admin'], function()
{
	Route::get('login', 
		'AuthAdmin\LoginController@showLoginForm')
		->name('admin.login');

	Route::post('login', 
		'AuthAdmin\LoginController@login')
		->name('admin.login.submit');
		
	Route::get('logout', 
		'AuthAdmin\LoginController@logout')
		->name('admin.logout');


	Route::get('home', 'Admin\DashboardController@home')
		->name('admin.home');

	Route::get('dashboard', 'Admin\DashboardController@home')
		->name('admin.home');

	Route::group( [ 'prefix' => 'proveedores' ], function()
	{
		Route::get( '', 'Admin\ProveedorController@index' )
			->name('admin.proveedores');

		Route::get( 'crear', 'Admin\ProveedorController@create' )
			->name('admin.proveedores.create');

		Route::post( 'almacenar', 'Admin\ProveedorController@store' )
			->name('admin.proveedores.store');

		Route::get( '{id}/editar', 'Admin\ProveedorController@edit' )
			->name('admin.proveedores.edit');

		Route::post( '{id}/actualizar', 'Admin\ProveedorController@update' )
			->name('admin.proveedores.update');

		Route::post( '{id}/destruir', 'Admin\ProveedorController@destroy' )
			->name('admin.proveedores.destroy');
	} );

	Route::group( [ 'prefix' => 'compras' ], function()
	{
		Route::get( '', 'Admin\CompraController@index' )
			->name('admin.compras');

		Route::get( 'crear', 'Admin\CompraController@create' )
			->name('admin.compras.create');

		Route::post( 'almacenar', 'Admin\CompraController@store' )
			->name('admin.compras.store');

		Route::get( '{id}/editar', 'Admin\CompraController@edit' )
			->name('admin.compras.edit');

		Route::post( '{id}/actualizar', 'Admin\CompraController@update' )
			->name('admin.compras.update');

		Route::post( '{id}/destruir', 'Admin\CompraController@destroy' )
			->name('admin.compras.destroy');
	} );

	Route::group( [ 'prefix' => 'inventarios' ], function()
	{
		Route::get( '', 'Admin\InventarioController@index' )
			->name('admin.inventarios');

		Route::get( 'crear', 'Admin\InventarioController@create' )
			->name('admin.inventarios.create');

		Route::post( 'almacenar', 'Admin\InventarioController@store' )
			->name('admin.inventarios.store');

		Route::get( '{id}/editar', 'Admin\InventarioController@edit' )
			->name('admin.inventarios.edit');

		Route::post( '{id}/actualizar', 'Admin\InventarioController@update' )
			->name('admin.inventarios.update');

		Route::post( '{id}/destruir', 'Admin\InventarioController@destroy' )
			->name('admin.inventarios.destroy');

		Route::get( '{id}', 'Admin\InventarioController@show' )
			->name('admin.inventarios.show');
	} );

	Route::group( [ 'prefix' => 'editoriales' ], function()
	{
		Route::get( '', 'Admin\EditorialController@index' )
			->name('admin.editoriales');

		Route::get( 'crear', 'Admin\EditorialController@create' )
			->name('admin.editoriales.create');

		Route::post( 'almacenar', 'Admin\EditorialController@store' )
			->name('admin.editoriales.store');

		Route::get( '{id}/editar', 'Admin\EditorialController@edit' )
			->name('admin.editoriales.edit');

		Route::post( '{id}/actualizar', 'Admin\EditorialController@update' )
			->name('admin.editoriales.update');

		Route::post( '{id}/destruir', 'Admin\EditorialController@destroy' )
			->name('admin.editoriales.destroy');
	} );

	Route::group( [ 'prefix' => 'libros' ], function()
	{
		Route::get( '', 'Admin\LibroController@index' )
			->name('admin.libros');

		Route::get( 'crear', 'Admin\LibroController@create' )
			->name('admin.libros.create');

		Route::post( 'almacenar', 'Admin\LibroController@store' )
			->name('admin.libros.store');

		Route::get( '{id}/editar', 'Admin\LibroController@edit' )
			->name('admin.libros.edit');

		Route::post( '{id}/actualizar', 'Admin\LibroController@update' )
			->name('admin.libros.update');

		Route::post( '{id}/destruir', 'Admin\LibroController@destroy' )
			->name('admin.libros.destroy');
	} );

	Route::group( [ 'prefix' => 'prestamos' ], function()
	{
		Route::get( '', 'Admin\PrestamoController@index' )
			->name('admin.prestamos');

		Route::get( 'crear', 'Admin\PrestamoController@create' )
			->name('admin.prestamos.create');

		Route::post( 'almacenar', 'Admin\PrestamoController@store' )
			->name('admin.prestamos.store');

		Route::get( '{id}/editar', 'Admin\PrestamoController@edit' )
			->name('admin.prestamos.edit');

		Route::post( '{id}/actualizar', 'Admin\PrestamoController@update' )
			->name('admin.prestamos.update');

		Route::post( '{id}/destruir', 'Admin\PrestamoController@destroy' )
			->name('admin.prestamos.destroy');
	} );

	Route::group( [ 'prefix' => 'devoluciones' ], function()
	{
		Route::get( '', 'Admin\DevolucionController@index' )
			->name('admin.devoluciones');

		Route::get( 'crear', 'Admin\DevolucionController@create' )
			->name('admin.devoluciones.create');

		Route::post( 'almacenar', 'Admin\DevolucionController@store' )
			->name('admin.devoluciones.store');

		Route::get( '{id}/editar', 'Admin\DevolucionController@edit' )
			->name('admin.devoluciones.edit');

		Route::post( '{id}/actualizar', 'Admin\DevolucionController@update' )
			->name('admin.devoluciones.update');

		Route::post( '{id}/destruir', 'Admin\DevolucionController@destroy' )
			->name('admin.devoluciones.destroy');
	} );


	Route::group( [ 'prefix' => 'usuarios' ], function()
	{
		Route::get( '', 'Admin\UserController@index' )
			->name('admin.users');

		Route::get( 'crear', 'Admin\UserController@create' )
			->name('admin.users.create');

		Route::post( 'almacenar', 'Admin\UserController@store' )
			->name('admin.users.store');

		Route::get( '{id}/editar', 'Admin\UserController@edit' )
			->name('admin.users.edit');

		Route::post( '{id}/actualizar', 'Admin\UserController@update' )
			->name('admin.users.update');

		Route::post( '{id}/destruir', 'Admin\UserController@destroy' )
			->name('admin.users.destroy');
	} );

/*
	Route::group( [ 'prefix' => 'categorias' ], function()
	{
		Route::get( '', 'Admin\CategoriaController@index' )
			->name('admin.categorias');

		Route::get( 'crear', 'Admin\CategoriaController@create' )
			->name('admin.categorias.create');

		Route::post( 'almacenar', 'Admin\CategoriaController@store' )
			->name('admin.categorias.store');

		Route::get( '{id}/editar', 'Admin\CategoriaController@edit' )
			->name('admin.categorias.edit');

		Route::post( '{id}/actualizar', 'Admin\CategoriaController@update' )
			->name('admin.categorias.update');

		Route::post( '{id}/destruir', 'Admin\CategoriaController@destroy' )
			->name('admin.categorias.destroy');
	} );

	Route::group( [ 'prefix' => 'productos' ], function()
	{
		Route::get( '', 'Admin\ProductoController@index' )
			->name('admin.productos');

		Route::get( 'crear', 'Admin\ProductoController@create' )
			->name('admin.productos.create');

		Route::post( 'almacenar', 'Admin\ProductoController@store' )
			->name('admin.productos.store');

		Route::get( '{id}/editar', 'Admin\ProductoController@edit' )
			->name('admin.productos.edit');

		Route::post( '{id}/actualizar', 'Admin\ProductoController@update' )
			->name('admin.productos.update');

		Route::post( '{id}/destruir', 'Admin\ProductoController@destroy' )
			->name('admin.productos.destroy');
	} );

	Route::group( [ 'prefix' => 'clientes' ], function()
	{
		Route::get( '', 'Admin\ClienteController@index' )
			->name('admin.clientes');

		Route::get( 'crear', 'Admin\ClienteController@create' )
			->name('admin.clientes.create');

		Route::post( 'almacenar', 'Admin\ClienteController@store' )
			->name('admin.clientes.store');

		Route::get( '{id}/editar', 'Admin\ClienteController@edit' )
			->name('admin.clientes.edit');

		Route::post( '{id}/actualizar', 'Admin\ClienteController@update' )
			->name('admin.clientes.update');

		Route::post( '{id}/destruir', 'Admin\ClienteController@destroy' )
			->name('admin.clientes.destroy');
	} );

	Route::group( [ 'prefix' => 'compras' ], function()
	{
		Route::get( '', 'Admin\CompraController@index' )
			->name('admin.compras');

		Route::get( 'crear', 'Admin\CompraController@create' )
			->name('admin.compras.create');

		Route::post( 'almacenar', 'Admin\CompraController@store' )
			->name('admin.compras.store');

		Route::get( '{id}/editar', 'Admin\CompraController@edit' )
			->name('admin.compras.edit');

		Route::post( '{id}/actualizar', 'Admin\CompraController@update' )
			->name('admin.compras.update');

		Route::post( '{id}/destruir', 'Admin\CompraController@destroy' )
			->name('admin.compras.destroy');

		Route::get( '{id}', 'Admin\CompraController@show' )
			->name('admin.compras.show');
	} );
*/
});