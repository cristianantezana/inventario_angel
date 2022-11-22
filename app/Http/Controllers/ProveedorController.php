<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Proveedor;
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
      
  }

  public function show($id)
  {
    
  }

  public function edit($id)
  {
    
  }

  public function update(Request $request, $id)
  {
    
  }

  public function destroy($id)
  {
    
  }
}
