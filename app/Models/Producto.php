<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Presentacion;
class Producto extends Model
{
    use HasFactory;
    protected $primaryKey = 'cod_producto';
    protected $table = 'producto';

    protected $fillable = ['cod_producto','cod_categoria_produ','cod_presentacion_produ',
                            'nombre_producto','imagen','estado','created_at','updated_at'
                        ];
    //relaciones
    public function categoria(){
        return $this->belongsTo(Categoria::class,'cod_categoria_produ','cod_categoria');
    }
    public function presentacion(){
        return $this->belongsTo(Presentacion::class,'cod_presentacion_produ','cod_presentacion');
    }
}
