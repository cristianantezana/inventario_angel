<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Vehiculo;

class VehiculoController extends Controller
{
  public function index()
  {
    $vehiculos = Vehiculo::where('estado','=',1)->orderBy('cod_vehiculo','desc')->take(10)->get();
    return view('vehiculos.index', compact('vehiculos'));
  }

  public function store(Request $request)
  {
    $vehiculo = new Vehiculo;
    $vehiculo->color = $request->input('color');
    $vehiculo->marca = $request->input('marca');
    $vehiculo->placa = $request->input('placa');
    $vehiculo->save();
    return redirect()->back()->with('mensaje', 'ok');
  }

  public function show($id)
  {
    
  }

  public function edit($id)
  {
    
  }

  public function update(Request $request, $id)
  {
    Vehiculo::find($id)->update($request->all());
    return redirect()->route('vehiculos.index')->with('mensaje', 'ok');
  }

  public function destroy($id)
  {
    $vehiculo = Vehiculo::find($id);
    $vehiculo-> estado = 0;
    $vehiculo->save();
    return "ok"; 
  }
}
