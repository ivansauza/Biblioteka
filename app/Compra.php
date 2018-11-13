<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compras';

    protected $fillable = [
    	'total', 'observaciones', 'biblioteca_id', 'proveedor_id'
    ];

    public function biblioteca()
    {
    	return $this->belongsTo('App\Biblioteca');
    }

    public function proveedor()
    {
    	return $this->belongsTo('App\Proveedor');
    }
}
