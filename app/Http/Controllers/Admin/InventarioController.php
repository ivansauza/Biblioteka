<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Inventario;
use App\Biblioteca;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventarios = Inventario::get();

        return view('admin.inventario.index', compact( 'inventarios' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sucursales = Biblioteca::get()->pluck( 'nombre', 'id' )->all();

        return view('admin.inventario.create', compact( 'sucursales' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validator($request);

        $obj = Inventario::where( 'biblioteca_id', '=', $data['biblioteca_id'] )
            ->first();

        if ( empty( $obj ) ) 
        {
            $inventario = new Inventario($data);
            $inventario->save();

            return redirect()->route('admin.inventarios');
        }

        return redirect()->route('admin.inventarios')->withErrors(['Error: La sucursal ya tiene un inventario !']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventario = Inventario::findOrFail($id);

        return view('admin.inventario.show', compact( 'inventario' ));
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

    public function validator($request)
    {
        return $request->validate([
            'biblioteca_id' => 'required|integer|exists:bibliotecas,id'
        ]);
    }
}
