<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proveedor;

class Compra extends Model
{
  use HasFactory;
  protected $primaryKey = 'cod_compra';
  protected $table = 'compra';
  protected $fillable = [    'cod_compra','cod_proveedor_com','descripcion',
                              'fecha','estado','created_at','updated_at'
                          ];
  //relaciones
  public function proveedor()
  {
    return $this->belongsTo(Proveedor::class, 'cod_proveedor_com','cod_proveedor');
  }
}
