<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Prestamo;
use App\User;
use App\Inventario;
use App\Libro;

class DevolucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestamos = Prestamo::where('fecha_devolucion', '!=', null)->get();

        return view('admin.devolucion.index', compact( 'prestamos' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prestamos = Prestamo::where('fecha_devolucion', '=', null)->get()->pluck( 'full_name', 'id' )->all();;

        return view('admin.devolucion.create', compact( 'prestamos' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'prestamo_id' => 'required|integer|exists:prestamos,id', 
            'nota'        => 'string|nullable'
        ]);

        $prestamo = Prestamo::findOrFail( $data['prestamo_id'] );
        $prestamo->fecha_devolucion = date('Y-m-d H:i:s');
        $prestamo->nota = $data['nota'];
        $prestamo->save();

        return redirect()->route('admin.devoluciones');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
