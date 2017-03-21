<?php

namespace App\Http\Controllers;

use App\Usuario;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cinema\User;
use Session;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $usuarios = Usuario::all();
      return view('usuarios/principal',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'nombre' => 'required|max:100',
          'nick' => 'required|max:50',
          'edad' => 'required',
        ]);
        //comentario
        //$datos= request()->all();
        Usuario::create([
          'nombre'=>$request['nombre'],
          'nick'=>$request['nick'],
          'edad'=>$request['edad'],
          'pass'=>bcrypt($request['password']),
        ]);
        return redirect()->to('principal')->with('message','registrado correctamente');
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
      $usuario = Usuario::find($id);
      return view('usuarios.edit',['usuario'=>$usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $id, Request $request)
    {
      $user = Usuario::find($id);
      $user->nombre     = $request->nombre;
       $user->nick    = $request->nick;
       $user->edad    = $request->edad;
       $user->pass = bcrypt($request->password);
       $user->save();
       Session::flash('message','Usuario Actualizado Correctamente');
       return redirect()->to('principal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try{
           $user = Usuario::findOrFail($id);
           $user->delete();
           return redirect()->to('principal')->with('message','usuario eliminado');;
       } catch (Exception $e){

           return "Fatal error - ".$e->getMessage();
       }
    }
}
