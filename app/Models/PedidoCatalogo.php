<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PedidoCatalogo extends Pivot
{
  use HasFactory;
  protected $primaryKey = 'cod_pedido_catalogo';
  protected $table = 'pedido_catalogo';

  protected $fillable = ['cod_pedido_catalogo','cod_pedido_pcata','cod_catalogo_pcata',
                          'cantidad','subtotal','estado','created_at','updated_at'
                          ];
}
