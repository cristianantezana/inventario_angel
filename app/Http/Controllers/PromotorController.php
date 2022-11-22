<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Promotor;

class PromotorController extends Controller
{
  public function index()
  {
    
  }

  public function create()
  {
  
  }

  public function store(Request $request)
  {
      
  }

  public function show($id)
  {
      dd('hola_ promotor'.'--'.$id);
  }

  public function edit($id)
  {
      dd('hola_ promotor'.'--'.$id);
  }

  public function update(Request $request, $id)
  {
  
  }

  public function destroy($id)
  {
  
  }
}
