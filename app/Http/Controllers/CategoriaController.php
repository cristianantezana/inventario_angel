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
    public function pepe()
    {
        //
        $categorias = Categoria::where('estado','=',1)->orderBy('cod_categoria','desc')->take(10)->get();
        return view('categorias.index', compact('categorias'));
        
    }

    public function index()
    {
        //
        dd('ola');
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
        $categoira = new Categoria();
        $categoira->nombre_categoria = $request->categoria;
        $categoira->save();
        return response()->json([
			'status' => 200,
		]);
     
	
    }
    public function table() {
		$emps = Categoria::where('estado','=',1)->orderBy('cod_categoria','DESC')->get();;
		$output = '';
		if ($emps->count() > 0) {
			$output .= '<table id="table" class="table table-striped cell-border" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>ID</center></th>
                                <th><center>Nombre</center></th>
                                <th><center>Acciones</center></th>
                            </tr>
                        </thead>
                        <tbody>';
                        foreach ($emps as $emp) {
                            $output .= '<tr>
                            <td><center>'.$emp->cod_categoria.'</center></td>
                            <td><center>'.$emp->nombre_categoria.'</center></td>
                            
                            <td><center>
                            <button type="button" "  class="btn btn-warning" data-toggle="modal" data-target="#editarPersona' . $emp->cod_categoria . '"><i class="fa fa-pencil" aria-hidden="true">  </i>
                            </button>
                            <button class="btn btn-danger eliminarPersona" method="DELETE" token="{{ csrf_token() }}" pagina="personas/index">
            <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                            </center></td>
                        </tr>';
                        }
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
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
    }
}
