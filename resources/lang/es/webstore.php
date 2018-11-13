
<?php

return [
	'item' 			=> 'Tienda web|Tiendas web', 
	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam eos iste assumenda dolor veritatis ducimus nostrum?', 
	'empty' 		=> 'No hay tiendas web que mostrar.', 
	'link'			=> 'Ir a mi tienda web', 
	'default'		=> 'Hacer esta tienda web como predeterminada.', 
	'disabled'		=> 'Su tienda web se ah deshabilitado cualquier enlace a la misma no se podra acceder.', 
	'enabled'		=> 'Su tienda web se habilito ahora es accesible a todo el publico.', 

	'form' => [
		'name' 				=> 'Nombre de la tienda web', 
		'domain'			=> 'Dominio', 
		'disabled'			=> 'Deshabilitar tienda web | Cualquier enlace a la tienda web ya no sera accesible, esta opción no eliminara datos.',
		'global_discount' 	=> 'El descuento se aplicara a todos los paquetes de la tienda, si el paquete tiene descuento este se sustituira por el descuento global.',
		 'free_basket' 		=> 'Permitir que se realizen pagos de paquetes por la minima cantidad de $0.00.', 
		 'billing_data' 	=> 'Requerir datos de facturación al realizar una compra. Los datos de facturación siempre son necesarios si los impuestos están configurados.', 
		 'google_analytics' => 'Ofrece información agrupada del tráfico que llega a los sitios web.'

	], 
	'crud' => [
		'create' 	=> 'Crear tienda web', 
		'store'		=> 'Almacenar tienda web', 
		'edit' 		=> 'Editar tienda web', 
		'update' 	=> 'Actualizar tienda web', 
		'delete' 	=> 'Eliminar tienda web', 
		'destroy' 	=> 'Destruir tienda web'
	], 
	'other' => [
		'welcome_message' 			=> 'Bienvenido a su nueva tienda web. Puede cambiar esta información en su administrador.', 
		'terms_message' 			=> 'Estos son los términos y condiciones que tus jugadores tienen que aceptar. Puedes cambiar los términos y condiciones en administrador.', 
		'delete_message'			=> 'Tenga en cuenta que si ya hay datos relacionados con este tienda no se podra eliminar, para eliminar el tienda por completo borre toda la informacion relacionada con el. <br /> Si desea conservar toda la información intente deshabilitarlo, de esta forma el tienda ya no será accesible al público y su información estara a salvo.', 
		'confirm_delete_message' 	=> '¿Está seguro que desea eliminar el tienda?'
	]
];
