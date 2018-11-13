<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $table = 'prestamos';

    protected $fillable = [
    	'user_id', 'nota'
    ];

    public function devolucion()
    {
    	return $this->hasOne('App\Devolucion');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function libros()
    {
    	return $this->belongsToMany('App\Libro');
    }

    public function getFullNameAttribute()
    {
        return 'ID: ' . $this->id . ' | Usuario: ' . $this->user->nombre . ' ' . $this->user->apellidos . ' | Fecha de retiro: ' . $this->created_at;
    }
}
