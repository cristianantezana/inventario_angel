<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
use App\Models\Medida;

class Presentacion extends Model
{
  use HasFactory;
  protected $primaryKey = 'cod_presentacion';
  protected $table = 'presentacion';
  protected $fillable = ['cod_presentacion','cod_medida_pre','nombre_presentacion',
                          'estado','created_at','updated_at'
                        ];
  //relaciones
  public function productos(){
      return $this->hasMany(Producto::class,'cod_presentacion_produ','cod_presentacion');
  }
  
  public function medida(){
      return $this->belongsTo(Medida::class,'cod_medida_pre','cod_medida');
  }
}
