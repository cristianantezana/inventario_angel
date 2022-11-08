<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
class Persona extends Model
{
    use HasFactory;
    protected $table = 'persona';
    protected $primaryKey = 'cod_persona';
    protected $fillable = [ 'cod_persona','nombre','apellido','celular',
                            'celular_2','direccion','estado','created_at',
                            'updated_at'
                        ];
    //relaciones

    public function usuario(){
        return $this->hasOne(Usuario::class,  'cod_persona_usu','cod_persona');
    }
    public function cliente(){
        return $this->hasOne(Usuario::class,  'cod_persona_cli','cod_persona');
    }
    public function proveedor(){
        return $this->hasOne(Usuario::class,  'cod_persona_prove','cod_persona');
    }
}
