<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Prestamo;

class PrestamoController extends Controller
{
    public function index()
    {
    	$prestamos = Prestamo::where( 'user_id', '=', \Auth::user()->id )
    		->get();

    	return view('user.prestamo.index', compact( 'prestamos' ));
    }

    public function show($id)
    {
		return view('user.prestamo.index');
    }
}
