<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Promotor;
class Vehiculo extends Model
{
    use HasFactory;
    protected $primaryKey = 'cod_vehiculo';
    protected $table = 'vehiculo';

    protected $fillable = ['cod_vehiculo','color','placa',
                            'marca','estado','created_at','updated_at'
                        ];

    //relaciones
    public function proveedor(){
        return $this->hasOne(Promotor::class,  'cod_vehiculo_pro','cod_vehiculo');
    }
}
