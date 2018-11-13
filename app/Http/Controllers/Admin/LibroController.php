<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Libro;
use App\Editorial;
use App\Inventario;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::get();

        return view('admin.libro.index', compact( 'libros' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $editoriales = Editorial::get()->pluck( 'nombre', 'id' )->all();
        $inventarios = Inventario::get()->pluck( 'full_name', 'id' )->all();

        return view('admin.libro.create', compact( 'editoriales', 'inventarios' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validator( $request );

        $libro = new Libro($data);
        $libro->save();

        return redirect()->route('admin.libros');
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
        $libro = Libro::findOrFail( $id );
        $editoriales = Editorial::get()->pluck( 'nombre', 'id' )->all();
        $inventarios = Inventario::get()->pluck( 'id', 'id' )->all();

        return view('admin.libro.edit', compact( 'libro', 'editoriales', 'inventarios' ));
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
        $libro = Libro::findOrFail( $id );

        $data = $this->validator( $request, $libro->id );

        $libro->fill( $data );
        $libro->save();

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
        $libro = Libro::findOrFail( $id );


        try { 
            $libro->delete();

        } catch(\Illuminate\Database\QueryException $e){ 

            return redirect()->back()->withErrors(['El registro no puede ser eliminado por que tiene datos asociados a el.']);
        }


        $libro->delete();

        return redirect()->route('admin.libros');
    }

    public function validator($request, $libro_id = null)
    {
        return $request->validate([
            'titulo'  => 'required|string', 
            'autor'   => 'required|string', 
            'isbn'    => 'required|string|unique:libros,isbn,' . $libro_id, 
            'paginas' => 'required|integer', 
            'existencia' => 'required|integer|min:1', 

            'editorial_id'  => 'required|integer|exists:editoriales,id', 
            'inventario_id' => 'required|integer|exists:inventarios,id'
        ]);
    }
}
