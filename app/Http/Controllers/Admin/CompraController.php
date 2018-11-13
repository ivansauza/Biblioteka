<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Compra;
use App\Biblioteca;
use App\Proveedor;

class CompraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::get();

        return view('admin.compra.index', compact( 'compras' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sucursales = Biblioteca::get()->pluck( 'nombre', 'id' )->all();
        $proveedores = Proveedor::get()->pluck( 'nombre', 'id' )->all();

        return view('admin.compra.create', compact( 'sucursales', 'proveedores' ));
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

        $compra = new Compra($data);
        $compra->save();

        return redirect()->route('admin.compras');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compra = Compra::findOrFail($id);

        $sucursales = Biblioteca::get()->pluck( 'nombre', 'id' )->all();
        $proveedores = Proveedor::get()->pluck( 'nombre', 'id' )->all();

        return view('admin.compra.edit', compact( 'compra', 'sucursales', 'proveedores' ));
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
        $compra = Compra::findOrFail($id);

        $data = $this->validator($request);

        $compra->fill($data);
        $compra->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $compra = Compra::findOrFail( $id );


        try { 
            $compra->delete();

        } catch(\Illuminate\Database\QueryException $e){ 

            return redirect()->back()->withErrors(['El registro no puede ser eliminado por que tiene datos asociados a el.']);
        }


        $compra->delete();

        return redirect()->route('admin.compras');
    }

    public function validator( Request $request )
    {
        return $request->validate([
            'biblioteca_id'  => 'required|integer|exists:bibliotecas,id', 
            'proveedor_id'   => 'required|integer|exists:proveedores,id', 
            'total'          => 'numeric|required',
            'observaciones'  => 'string|nullable'
        ]);
    }
}
