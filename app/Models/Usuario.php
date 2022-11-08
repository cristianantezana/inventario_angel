<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Persona;
class Usuario extends Model
{
    use HasFactory;
    protected $primaryKey = 'cod_usuario';
    protected $table = 'usuario';

    protected $fillable = ['cod_usuario','cod_persona_usu','cod_rol_usu',
                            'password','correo','estado','created_at','updated_at'
                        ];
    //relaciones

    public function persona(){
        return $this->belongsTo(Persona::class,'cod_persona_usu', 'cod_persona');
        
    }
}
