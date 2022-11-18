<?php

namespace App\Http\Controllers;
use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
  public function index()
  {
    $personas = Persona::where('estado','=',1)->orderBy('cod_persona','desc')->take(10)->get();
    return view('personas.index', compact('personas'));
  }

  public function store(Request $request)
  {
    $persona = new Persona;
    $persona->nombre = $request->input('nombre');
    $persona->apellido = $request->input('apellido');
    $persona->celular = $request->input('celular');
    $persona->celular_2 = $request->input('telefono');
    $persona->direccion = $request->input('direccion');
    $persona->save();
    return redirect()->back()->with('mensaje', 'ok');
  }

  public function buscar(Request $request)
  {
    $dato = $request->get('buscar');
    $personas = Persona::where('nombre', 'like', '%'.$dato.'%')->where('estado','=','1')
                        ->orderBy('cod_persona','desc')->take(10)->get();
    return json_encode($personas);
  }

  public function update(Request $request, $id)
  {
    Persona::find($id)->update($request->all());
    return redirect()->route('personas.index')->with('mensaje', 'ok');
  }

  public function destroy($id)
  {
    $persona = Persona::find($id);
    $persona-> estado = 0;
    $persona->save();
    return "ok";  
  }
}
