<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Persona;
class ClienteController extends Controller
{
  public function index()
  {
    $clientes = Cliente::where('estado', '=', 1)->take(10)->get();
    return view('clientes.index', compact('clientes'));
  }

  public function create()
  {
    return view('clientes.create');
  }

  public function store(Request $request)
  {
    $cliente = new Cliente();
    $cliente->cod_persona_cli = $request->input('id');
    $cliente->nit = $request->input('nit');
    $cliente->razon_social = $request->input('razon_social');
    $cliente->save();
    dd($request->input('id'));
  }

  public function show($id)
  {

  }

  public function edit($id)
  {

  }

  public function update(Request $request, $id)
  {
      $cod_persona = $request->cod_persona;
      $persona = Persona::find($cod_persona);
      $cliente = Cliente::find($id);
      $data = ['nit' => $request->nit ,'razon_social' => $request->razon_social];
      $cliente->update($data);
      $data_persona = ['nombre' => $request->nombre,'apellido' => $request->apellido,'celular' => $request->celular,'celular_2' => $request->telefono,'direccion' => $request->direccion];
      $persona->update($data_persona);
      return redirect()->route('clientes.index')->with('mensaje', 'ok');
  }

  public function destroy($id)
  {
    $cliente = Cliente::find($id);
    $cliente-> estado = 0;
    $cliente->save();
    return "ok"; 
  }

  public function personaRegistrada($id)
  {
    $persona = Persona::find($id);
    return redirect()->route('clientes.create')->with('persona', $persona, );
  }

  public function buscar(Request $request)
  {
    $dato = $request->get('buscar');
    $personas = Persona::where('nombre', 'like', '%'.$dato.'%')
                        ->where('estado','=','1')->orderBy('cod_persona','desc')->take(10)->get();
                        $ruta = 'persona';
    if($personas->count() > 0)
    {
      $tabla = '<div class="dropdown-menu" > </div>';
      foreach ($personas as $item)
      {
        $tabla .= '<a href="'.$ruta.'/'.$item->cod_persona.'" style ="font-size: 15px;" 
                    class="dropdown-item" >'.$item->nombre.' '.$item->apellido.'</a>';   
      }
      echo $tabla;
    }else
    {
      echo '<h3 class="text-center text-secondary my-5">
              No hay registro presente en la base de datos Registre a esa persona!
            </h3>';
    }
  }
}
