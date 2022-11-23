<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categoria;
class CategoriaController extends Controller
{
  public function index()
  { 
    $categorias = Categoria::where('estado','=',1)
                  ->orderBy('cod_categoria','desc')->take(10)->get();
    return view('categorias.index', compact('categorias'));
  }

  public function store(Request $request)
  {
    $categoria = new Categoria();
    $categoria->nombre_categoria = $request->categoria;
    $categoria->save();
    return response()->json(['status' => 200,]);
  }

  public function table() 
  {
    $categorias = Categoria::where('estado','=',1)->orderBy('cod_categoria','DESC')->get();
    $tabla = '';
    $contador = 1;
    if ($categorias->count() > 0)
    {
      $tabla .= '<table id="table" class="table table-bordered table-striped table-hover"  >
                  <thead style="background-color: #6777ef;">
                      <tr>
                        <th style="color: #fff;"><center>ITEM</center></th>
                        <th style="color: #fff;"><center>Nombre</center></th>
                        <th style="color: #fff;"><center>Acciones</center></th>
                      </tr>
                  </thead>
                  <tbody>';
                    foreach ($categorias as $item)
                    {
                        $tabla .= '<tr>
                          <td><center>'.$contador.'</center></td>
                          <td><center>'.$item->nombre_categoria.'</center></td>
                          <td>
                            <center>
                              <a href="#" id="'. $item->cod_categoria.'" data-toggle="modal"
                              data-target="#staticBackdrop" class="btn btn-warning btn-sm mx-2 editar"><i class="fa fa-pencil" aria-hidden="true"></i>
                              </a>
                              <a href="#" id="'.$item->cod_categoria.'" class="btn btn-danger btn-sm mx-2 eliminar">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </a>
                            </center>
                          </td>
                        </tr>';
                      $contador++;
                    }
        $tabla .= '</tbody></table>';
        echo $tabla;
      } else {
          echo '<h1 class="text-center text-secondary my-5">No hay registro presente en la base de datos!</h1>';
      }
  }

  public function edit(Request $request)
  {
    $id = $request->id;
    $data = Categoria::find($id);
    return response()->json($data);
  }

  public function update(Request $request)
  {
    $categoria = Categoria::find($request->categoria_id);
    $data = ['nombre_categoria' => $request->nombre];
    $categoria->update($data);
    return response()->json(['status' => 200,]);
  }

  public function destroy(Request $request)
  {
    $id = $request->id;
    $categoria = Categoria::find($id);
    $data = ['estado' => '0'];
    $categoria->update($data);
  }
}
