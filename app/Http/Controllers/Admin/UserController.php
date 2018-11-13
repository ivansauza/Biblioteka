<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
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
        $users = User::get();

         return view('admin.user.index', compact( 'users' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.user.create');
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

        $user = new User( $data );
        $user->save();

        return redirect()->route('admin.users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return view('admin.user.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail( $id );

         return view('admin.user.edit', compact( 'user' ));
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

    public function validator(Request $request, $id = null)
    {
        $rules =  [
            'nombre'            => 'required|string|max:60',
            'apellidos'         => 'required|string|max:120',  
            'sexo'              => 'required|boolean', 
            'fecha_nacimiento'  => 'string|nullable', 
            'localidad'         => 'string|nullable', 
            'municipio'         => 'string|nullable', 
            'direccion'         => 'string|nullable',
            'cp'                => 'string|nullable',  
            'email'             => 'required|string|email|max:255|unique:users,email,' . $id, 
            'password'          => 'required|string|min:6|confirmed'
        ];

        return $request->validate( $rules );
    }
}
