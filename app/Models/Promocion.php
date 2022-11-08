<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    use HasFactory;
   
    protected $primaryKey = 'cod_promocion';
    protected $table = 'promocion';

    protected $fillable = ['cod_promocion','nombre_promocion','descripcion_promocion',
                            'estado','created_at','updated_at'
                        ];
}
