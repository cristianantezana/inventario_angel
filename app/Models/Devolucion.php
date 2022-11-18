<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;

class Devolucion extends Model
{
  use HasFactory;
  protected $primaryKey = 'cod_devolucion';
  protected $table = 'devolucion';
  protected $fillable = ['cod_devolucion','cod_pedido_devo','motivo',
                          'estado','created_at','updated_at'
                          ];
  //relacion
  public function pedido(){
    return $this->belongsTo(Pedido::class, 'cod_pedido_devo', 'cod_pedido');
  }
}
