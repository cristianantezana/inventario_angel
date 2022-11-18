<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Presentacion;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Medida;

class PresentacionController extends Controller
{
  public function index()
  { 
    $medida = Medida::where('estado','=',1)->orderBy('nombre_medida','ASC')->get();
    $presentaciones = Presentacion::where('estado','=',1)->orderBy('cod_presentacion','desc')->take(10)->get();
    return view('presentaciones.index', compact('medida','presentaciones'));
  }

  public function store(Request $request)
  {
    $presentacion = new Presentacion;
    $presentacion->nombre_presentacion = $request->input('nombre');
    $presentacion->cod_medida_pre = $request->input('medida_id');
    $presentacion->save();
    return redirect()->back()->with('mensaje', 'ok');
  }
  
  public function update(Request $request, $id)
  {
    $presentacion = Presentacion::find($id);
    $data = ['nombre_presentacion' => $request->nombre,'cod_medida_pre' => $request->medida_id];
    $presentacion->update($data);
    return redirect()->route('presentaciones.index')->with('mensaje', 'ok');
  }

  public function destroy($id)
  {
    $presentacion = Presentacion::find($id);
    $presentacion-> estado = 0;
    $presentacion->save();
    return "ok";
  }
}
