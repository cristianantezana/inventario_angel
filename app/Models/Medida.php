<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Presentacion;
class Medida extends Model
{
    use HasFactory;
    protected $primaryKey = 'cod_medida';
    protected $table = 'medida';

    protected $fillable = [ 'cod_medida','nombre_medida','estado',
                            'created_at','updated_at'
                            ];
    //relaciones
    public function presentacion(){
        return $this->hasMany(Presentacion::class,'cod_medida_pre','cod_medida');
    }
}
