<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Prestamo;
use App\User;
use App\Inventario;
use App\Libro;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestamos = Prestamo::get();

        return view('admin.prestamo.index', compact( 'prestamos' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $libros         = $this->getInventarioLibro();
        $users          = User::get()->pluck( 'full_name', 'id' )->all();
        $inventarios    = Inventario::get()->pluck( 'full_name', 'id' )->all();

        return view('admin.prestamo.create', compact( 'libros', 'users', 'inventarios' ));
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

        //Comprobar que los libros enviados son del inventario eviado
        foreach ($data['libros'] as $key => $libro_id) 
        {
            $libro = Libro::find( $libro_id );

            if ( $libro->inventario->id != $data['inventario_id'] ) 
            {
                return redirect()->back()->withErrors(['Error: No se pueden añadir libros de otro inventario al seleccionado !']);
            }
        }

        //Comprobar que hay libros disponibles para prestrar
        foreach ($data['libros'] as $key => $libro_id) 
        {
            $libro = Libro::find( $libro_id );

            if ( $libro->getDisponibles() == 0 ) 
            {
                return redirect()->back()->withErrors(['Error: El libro; ' . $libro->titulo . ' ¡ no quedan copias disponibles en este momento !']);;
            }
        }


        //Comprobar que los libros no estan prestados
        /*
        foreach ($data['libros'] as $key => $libro_id) 
        {
            $libro = Libro::find( $libro_id );
            $temp = $libro->prestamos->where('fecha_devolucion', '=', null);

            if ( ! $temp->isEmpty() ) 
            {
                return redirect()->back()->withErrors(['Error: El libro; ' . $libro->titulo . ' ¡ ya esta prestado !']);;
            }
        }
        */
        $prestamo = new Prestamo($data);
        $prestamo->save();

        $prestamo->libros()->sync($data['libros']);

        return redirect()->route('admin.prestamos');
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

    protected function getInventarioLibro()
    {
        $inventarios = Inventario::get();
        $array       = $inventarios->pluck( 'id', 'id' );

        $inventarios->each( function( $item, $key ) use ($array)
        {
            $libros = $item->libros;

                if ( $libros->isEmpty() ) 
                {
                    $array = array_except($array, [$item->nombre]);
                }
                else
                {
                    $array[$item->id]   = $libros->pluck( 'full_disponibles', 'id' )->all();
                }
        } );

        return $array->all();
    }

    public function validator($request)
    {
        return $request->validate([
            'user_id'       => 'required|integer|exists:users,id', 
            'inventario_id' => 'required|integer|exists:inventarios,id', 
            'libros'        => 'required|array', 
            'libros.*'      => 'integer|exists:libros,id|distinct', 
            'nota'          => 'string|nullable'
        ]);
    }
}
