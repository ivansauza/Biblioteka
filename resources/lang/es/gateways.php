<?php

return [
	'item' 			=> 'Pasarela|Pasarelas', 
	'description' 	=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam eos iste assumenda dolor veritatis ducimus nostrum?', 

	'form' => [
		'disabled' => 'Deshabilitar esta pasarela de pago. | Ya no se podran pagar con este servicio.'
	], 
	'crud' => [
		'create' 	=> 'Crear pasarela', 
		'add'		=> 'Agregar pasarela', 
		'store'		=> 'Almacenar pasarela', 
		'edit' 		=> 'Editar pasarela', 
		'update' 	=> 'Actualizar pasarela', 
		'delete' 	=> 'Eliminar pasarela', 
		'destroy' 	=> 'Destruir pasarela'
	], 
	'other' => [
		
	], 
	'paygol' => [
		'description' => 'Recibe pagos desde cualquier lugar del mundo.', 
		'form' => [
			'service_id' => [
				'label' 	=> 'ID del servicio', 
				'holder' 	=> 'ID de servicio de tu cuenta paygol.'
			], 

			'secret_key' => [
				'label' 	=> 'IPN Llave secreta', 
				'holder' 	=> 'Llave secreta para notificaciones instatáneas de pago.'
			]
		]
	]
];