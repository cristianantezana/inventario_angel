<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Compra;
class Proveedor extends Model
{
    use HasFactory;
    protected $primaryKey = 'cod_proveedor';
    protected $table = 'proveedor';

    protected $fillable = [ 'cod_proveedor','cod_persona_prove','empresa',
                            'razon_social','estado','created_at','updated_at'
                        ];
    //relaciones
    public function persona(){
        return $this->belongsTo(Persona::class,'cod_persona_prove', 'cod_persona');
        
    }
    public function compras()
    {
        return $this->hasMany(Compra::class , 'cod_proveedor_com','cod_proveedor');
    }
}
