<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventarios';

    protected $fillable = [
    	'biblioteca_id'
    ];

    public function biblioteca()
    {
    	return $this->belongsTo('App\Biblioteca');
    }

    public function libros()
    {
    	return $this->hasMany('App\Libro');
    }

    public function getFullNameAttribute()
    {
        return 'ID: ' . $this->id .  ' | Sucursal:  ' . $this->biblioteca->nombre;
    }
}
