<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  use HasFactory;
  protected $primaryKey = 'cod_cliente';
  protected $table = 'cliente';
  protected $fillable = [   'cod_cliente','cod_persona_cli','nit',
                              'razon_social','estado','created_at','updated_at' 
                          ];
  //relaciones
  public function persona(){
    return $this->belongsTo(Persona::class,'cod_persona_cli', 'cod_persona');
  }

  public function pedidos(){
    return $this->hasMany(Pedido::class,'cod_cliente_ped','cod_cliente');
  }
}
