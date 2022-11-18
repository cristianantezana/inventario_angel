<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Presentacion;

class ProductoController extends Controller
{
  public function index()
  { 
    $presentacion = Presentacion::where('estado','=',1)
                                  ->orderBy('nombre_presentacion','ASC')->get();
    $categorias= Categoria::where('estado','=',1)
                          ->orderBy('nombre_categoria','ASC')->get();
    $productos = Producto::where('estado','=',1)
                          ->orderBy('cod_producto','desc')->take(10)->get();
    return view('productos.index', compact('productos','categorias','presentacion'));
  }

  public function store(Request $request)
  {
    $productos = new Producto;
    $productos->nombre_producto = $request->input('nombre');
    $productos->cod_presentacion_produ = $request->input('presentacion_id');
    $productos->cod_categoria_produ = $request->input('categoria_id');
    $productos->save();
    return redirect()->back()->with('mensaje', 'ok');
  }

  public function update(Request $request, $id)
  {
    $producto = Producto::find($id);
    $data = ['nombre_producto' => $request->nombre,'cod_categoria_produ' => $request->categoria_id,
                'cod_presentacion_produ' => $request->presentacion_id];
    $producto->update($data);
    return redirect()->route('productos.index')->with('mensaje', 'ok');
  }

  public function destroy($id)
  {
    $producto = Producto::find($id);
    $producto-> estado = 0;
    $producto->save();
    return "ok";
  }
}
