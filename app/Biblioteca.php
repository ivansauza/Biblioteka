<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biblioteca extends Model
{
    protected $table = 'bibliotecas';

    protected $fillable = [
    	
    ];

    public function admin()
    {
    	return $this->hasOne('App\Admin');
    }

    public function compras()
    {
    	return $this->hasMany('App\Compra');
    }

    public function empleados()
    {
    	return $this->hasMany('App\Empleado');
    }

    public function inventario()
    {
    	return $this->hasOne('App\Inventario');
    }
}
