<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::where('estado','=',1)->orderBy('cod_persona','desc')->take(10)->get();
        return view('personas.index', compact('personas'));
        //
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        dd('hola_ create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $persona = new Persona;
        $persona->nombre = $request->input('nombre');
        $persona->apellido = $request->input('apellido');
        $persona->celular = $request->input('celular');
        $persona->celular_2 = $request->input('telefono');
        $persona->direccion = $request->input('direccion');
        $persona->save();
        return redirect()->back()->with('mensaje', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function buscar(Request $request)
    {
        //
        $dato = $request->get('buscar');
        $personas = Persona::where('nombre', 'like', '%'.$dato.'%')->where('estado','=','1')
                            ->orderBy('cod_persona','desc')->take(10)->get();
        return json_encode($personas);
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
        dd('hola_ create'.'--'.$id);
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
         Persona::find($id)->update($request->all());
        return redirect()->route('personas.index')->with('mensaje', 'ok');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = Persona::find($id);
        $persona-> estado = 0;
        $persona->save();
        return "ok";
        
    }
}
