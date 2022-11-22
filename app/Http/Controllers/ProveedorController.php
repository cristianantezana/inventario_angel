<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\Persona;

class ProveedorController extends Controller
{
  public function index()
  {
    $proveedores= Proveedor::where('estado', '=', 1)->take(10)->get();
    return view('proveedores.index', compact('proveedores'));
  }

  public function create()
  { 
    return view('proveedores.create');
  }

  public function store(Request $request)
  {
    $cliente = new Proveedor();
    $cliente->cod_persona_prove = $request->input('id');
    $cliente->empresa = $request->input('empresa');
    $cliente->razon_social = $request->input('razon_social');
    $cliente->save();
    return redirect()->route('proveedores.index')->with('mensaje', 'ok');
  }

  public function show($id)
  {
    
  }

  public function edit($id)
  {
    
  }

  public function personaRegistrada($id)
  {
    $persona = Persona::find($id);
    return redirect()->route('proveedores.create')->with('persona', $persona, );
  }

  public function update(Request $request, $id)
  {
    $cod_persona = $request->cod_persona;
    $persona = Persona::find($cod_persona);
    $proveedor = Proveedor::find($id);
    $data = ['empresa' => $request->empresa ,'razon_social' => $request->razon_social];
    $proveedor->update($data);
    $data_persona = ['nombre' => $request->nombre,'apellido' => $request->apellido,'celular' => $request->celular,
                      'celular_2' => $request->telefono,'direccion' => $request->direccion
                    ];
    $persona->update($data_persona);
    return redirect()->route('proveedores.index')->with('mensaje', 'ok');
  }

  public function destroy($id)
  {
    $proveedor = Proveedor::find($id);
    $proveedor-> estado = 0;
    $proveedor->save();
    return "ok"; 
  }
}
