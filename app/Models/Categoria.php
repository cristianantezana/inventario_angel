<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $primaryKey = 'cod_categoria';
    protected $table = 'categoria';

    protected $fillable = [   'cod_categoria','nombre_categoria',
                                'estado','created_at','updated_at'
                            ];
    
    //relaciones
    public function productos(){
        return $this->hasMany(Producto::class,'cod_categoria_produ','cod_categoria');
    }
}
