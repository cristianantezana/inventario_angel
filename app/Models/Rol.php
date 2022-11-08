<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $primaryKey = 'cod_rol';
    protected $table = 'rol';

    protected $fillable = ['cod_rol','nombre_rol','estado',
                            'created_at','updated_At'
                        ];
}
