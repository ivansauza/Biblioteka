<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Prestamo;

class Libro extends Model
{
    protected $table = 'libros';

    protected $fillable = [
    	'titulo', 'autor', 'isbn', 'paginas', 'editorial_id', 'inventario_id', 'existencia'
    ];

    public function inventario()
    {
    	return $this->belongsTo('App\Inventario');
    }

    public function editorial()
    {
    	return $this->belongsTo('App\Editorial');
    }

    public function prestamos()
    {
    	return $this->belongsToMany('App\Prestamo');
    }

    public function getFullDisponiblesAttribute()
    {
        return $this->titulo . ' | Disponibles: ' . $this->getDisponibles();
    }

    public function getDisponibles()
    {
        $count = 0;

        $prestamos = Prestamo::where( 'fecha_devolucion', '=', null )
            ->get();

        foreach ($prestamos as $key => $prestamo) 
        {
            $count = $count + $prestamo->libros->where('pivot.libro_id', '=', $this->id)->count();
        }

        return ($this->existencia -  $count);
        
    }

    public function getPrestados()
    {
        $count = 0;

        $prestamos = Prestamo::where( 'fecha_devolucion', '=', null )
            ->get();

        foreach ($prestamos as $key => $prestamo) 
        {
            $count = $count + $prestamo->libros->where('pivot.libro_id', '=', $this->id)->count();
        }

        return $count;
        
    }
}
