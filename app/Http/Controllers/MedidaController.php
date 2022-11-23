<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Medida;
use App\Models\Categoria;

class MedidaController extends Controller
{
  public function index()
  {
    $medidas = Categoria::where('estado','=',1)->orderBy('cod_categoria','desc')->take(10)->get();
    return view('medidas.index', compact('medidas')); 
  }

  public function table()
  {
    $medida = Medida::where('estado','=',1)->orderBy('cod_medida','DESC')->get();;
    $tabla = '';
    $contador = 1;
    if ($medida->count() > 0)
    {
      $tabla .= '<table id="table_medida" class="table table-striped cell-border" style="width:100%">
                    <thead style="background-color: #6777ef;">
                        <tr>
                          <th style="color: #fff;"><center>ITEM</center></th>
                          <th style="color: #fff;"><center>Nombre</center></th>
                          <th style="color: #fff;"><center>Sigla</center></th>
                          <th style="color: #fff;"><center>Acciones</center></th>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach ($medida as $item)
                    {
                      $tabla .= '<tr>
                          <td><center>'.$contador.'</center></td>
                          <td><center>'.$item->nombre_medida.'</center></td>
                          <td><center>'.$item->sigla_medida.'</center></td> 
                          <td>
                            <center>
                              <a href="#" id="' . $item->cod_medida . '" data-toggle="modal" data-target="#staticBackdrop" 
                                class="btn-warning btn-sm mx-2 editar" ><i class="fa fa-pencil" aria-hidden="true"></i>
                              </a>
                              <a href="#" id="' . $item->cod_medida . '" class="btn btn-danger btn-sm mx-2 eliminar">
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
        echo '<h1 class="text-center text-secondary my-5">No Hay ningun registro en la base de datos!</h1>';
      }
	}

  public function store(Request $request)
  {
    $medidas = new Medida();
    $medidas->nombre_medida = $request->nombre_medida;
    $medidas->sigla_medida = $request->sigla_medida;
    $medidas->save();
    return response()->json(['status' => 200,]);
  }

  public function edit(Request $request)
  {
    $id = $request->id;
    $dato = Medida::find($id);
    return response()->json($dato);
  }

  public function update(Request $request)
  {
    $medida = Medida::find($request->medida_id);
    $data = ['nombre_medida' => $request->nombre_medida,'sigla_medida' => $request->sigla_medida];
    $medida->update($data);
    return response()->json(['status' => 200,]);
  }

  public function destroy(Request $request)
  {
    $id = $request->id;
    $medida = Medida::find($id);
    $data = ['estado' => '0'];
    $medida->update($data);
  }
}


