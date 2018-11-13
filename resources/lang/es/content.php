
<?php

return [
	'item' 			=> 'Contenido|Contenidos', 
	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam eos iste assumenda dolor veritatis ducimus nostrum?', 
	'empty' 		=> 'No hay contenidos que mostrar.', 

	'form'					=> [
		'name'				=> 'Nombre del contenido', 
		'anchor'			=> 'Anclar a un contenido', 
		'no_anchor'			=> 'No anclar a ningún contenido', 
		'order_packages' 	=> [
			'message' 		=> 'Orden de paquetes', 
			'manual' 		=> 'Manual'

		], 

		'view_packages'			=> [
			'message' 			=> 'Vista de paquetes',
			'grid_images' 		=> 'Cuadricula (Imágenes)', 
			'grid_information' 	=> 'Cuadricula (Información)', 
			'list_information'	=> 'Lista (Información)', 
			'list_images'		=> 'Lista (Imágenes)', 
			'grid_comparable'	=> 'Cuadricula (Comparable)'
		], 

		'description' 			=> 'Descripción', 
		'hide_sidebar' 			=> 'No mostrar la barra lateral de la tienda web.', 
		'show_packages_menu' 	=> 'Mostrar paquetes como lista en la barra de navegación.', 
		'hidden' 				=> 'Ocultar este contenido de la barra de navegación.', 
		'disabled'  			=> 'Deshabilitar | Desactive este contenido , no sera visible en su tienda web, esta opción no eliminara datos.'
	], 
	'crud' => [
		'create' 	=> 'Crear contenido', 
		'store'		=> 'Almacenar contenido', 
		'edit' 		=> 'Editar contenido', 
		'update' 	=> 'Actualizar contenido', 
		'delete' 	=> 'Eliminar contenido', 
		'destroy' 	=> 'Destruir contenido'
	], 
	'other' => [
		'create_sub' => 'Crear subcontenido', 
		'view'		 => 'Ver contenido en la tienda web.'
	]
];
