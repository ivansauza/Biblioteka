
<?php

return [
	'item' 	=> 'Usuario|Usuarios', 

	'form'	=> [
		'name' 		=> 'Nombre del usuario', 
		'last_name'	=> 'Apellidos', 
		'gender'	=> 'Sexo', 
		'genders' => ['male' => 'Masculino', 'female' => 'Femenino'], 
		'birthdate' => 'Fecha de nacimiento', 
		'birthdate_format' => 'AAA-MM-DD', 
		'minecraft_username' => 'Nombre de usuario de minecraft', 
		'email'		=> 'Correo electrónico', 
		'new_password' => 'Contraseña nueva', 
		'confirm_password' => 'Confirmar contraseña', 
		'current_password' => 'Contraseña actual', 
	], 
	'crud'	=> [
		'create' 	=> 'Crear usuario', 
		'store'		=> 'Almacenar usuario', 
		'edit' 		=> 'Editar usuario', 
		'update' 	=> 'Actualizar usuario', 
		'delete' 	=> 'Eliminar usuario', 
		'destroy' 	=> 'Destruir usuario'
	], 
	'other'	=> [
		
	]
];
