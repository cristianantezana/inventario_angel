<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorias = Categoria::where('estado','=',1)->orderBy('cod_categoria','desc')->take(10)->get();
        return view('categorias.index', compact('categorias'));
        
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
        $categoria = new Categoria();
        $categoria->nombre_categoria = $request->categoria;
        $categoria->save();
        return response()->json([
			'status' => 200,
		]);
     
	
    }
    public function table() {
		$categorias = Categoria::where('estado','=',1)->orderBy('cod_categoria','DESC')->get();;
		$tabla = '';
        $contador = 1;
		if ($categorias->count() > 0) {
			$tabla .= '<table id="table" class="table table-striped cell-border" style="width:100%">
                        <thead class="bg-primary">
                            <tr>
                                <th><center>ITEM</center></th>
                                <th><center>Nombre</center></th>
                                <th><center>Acciones</center></th>
                            </tr>
                        </thead>
                        <tbody>';
                        foreach ($categorias as $item) {
                            $tabla .= '<tr>
                            <td><center>'.$contador.'</center></td>
                            <td><center>'.$item->nombre_categoria.'</center></td>
                            <td><center>
                            <a href="#" id="' . $item->cod_categoria . '" data-toggle="modal" data-target="#staticBackdrop" class="text-success mx-1 editar" ><i class="fa fa-pencil h4"></i></a>
                            <a href="#" id="' . $item->cod_categoria . '" class="text-danger mx-1 eliminar"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                            </center></td>
                        </tr>';
                        $contador++;
                        }
			$tabla .= '</tbody></table>';
			echo $tabla;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No hay registro presente en la base de datos!</h1>';
		}
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
    public function edit(Request $request)
    {
        //
        $id = $request->id;
		$data = Categoria::find($id);
		return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
		$categoria = Categoria::find($request->categoria_id);
		$data = ['nombre_categoria' => $request->nombre];
		$categoria->update($data);
		return response()->json([
			'status' => 200,
		]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $id = $request->id;
        $categoria = Categoria::find($id);
		$data = ['estado' => '0'];
		$categoria->update($data);
    }
}
