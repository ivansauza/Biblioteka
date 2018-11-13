<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';

    protected $fillable = [
    	'nombre', 'apellidos', 'sexo', 'fecha_nacimiento', 'localidad', 'municipio', 'direccion', 'cp', 'email', 'password'
    ];

    public function biblioteca()
    {
    	return $this->belongsTo('App\Biblioteca');
    }
}
