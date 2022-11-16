<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Presentacion;
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $presentacion = Presentacion::where('estado','=',1)->orderBy('nombre_presentacion','ASC')->get();
        $categorias= Categoria::where('estado','=',1)->orderBy('nombre_categoria','ASC')->get();
        $productos = Producto::where('estado','=',1)->orderBy('cod_producto','desc')->take(10)->get();
        return view('productos.index', compact('productos','categorias','presentacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $productos = new Producto;
        $productos->nombre_producto = $request->input('nombre');
        $productos->cod_presentacion_produ = $request->input('presentacion_id');
        $productos->cod_categoria_produ = $request->input('categoria_id');
        $productos->save();
        return redirect()->back()->with('mensaje', 'ok');
        
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
        //
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

        $producto = Producto::find($id);
        $empData = ['nombre_producto' => $request->nombre,'cod_categoria_produ' => $request->categoria_id,'cod_presentacion_produ' => $request->presentacion_id];

		$producto->update($empData);
        //dd($producto);
        return redirect()->route('productos.index')->with('mensaje', 'ok');
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
        $persona = Producto::find($id);
        if($persona -> estado == 1)
        {
            $persona-> estado = 0;
        }
        else
        {
            $persona->estado = 1;
        }
        $persona->save();
       // return redirect()->route('personas.index')->with('mensaje', 'ok');
       return "ok";
    }
}
