<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;
use App\Models\Vehiculo;
class Promotor extends Model
{
    use HasFactory;
    protected $primaryKey = 'cod_promotor';
    protected $table = 'promotor';

    protected $fillable = ['cod_promotor','cod_usuario_pro','cod_vehiculo_pro',
                            'comision','fecha_ingreso','estado','created_at','updated_at'
                        ];
    // relaciones

    public function vehiculo(){
        return $this->belongsTo(Vehiculo::class,'cod_vehiculo_pro', 'cod_vehiculo');
        
    }

    public function pedidos(){
        return $this->hasMany(Pedido::class, 'cod_promotor_ped','cod_promotor');
    }

}
