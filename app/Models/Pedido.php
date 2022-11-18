<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Devolucion;
use App\Models\Promotor;
use App\Models\Catalogo;

class Pedido extends Model
{
  use HasFactory;
  protected $primaryKey = 'cod_pedido';
  protected $table = 'pedido';
  protected $fillable = [ 'cod_pedido','cod_promotor_ped','cod_cliente_ped',
                          'nota','estado','created_at','updated_at'
                        ];
  //relaciones
  public function devolucion(){
      return $this->hasOne(Devolucion::class, 'cod_pedido_devo', 'cod_pedido');
  }

  public function cliente(){
      return $this->belongsTo(Cliente::class,'cod_cliente_ped', 'cod_cliente');
      
  }

  public function promotor(){
      return $this->belongsTo(Promotor::class,'cod_promotor_ped', 'cod_promotor');
  }

  public function catalogos(){
      return $this->belongsToMany(Catalogo::class,'pedido_catalogo','cod_pedido_pcata','cod_catalogo_pcata')
                  ->withPivot('cantidad', 'subtotal');
  }
}
