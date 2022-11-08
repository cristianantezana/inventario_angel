<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;
use App\Models\PedidoCatalogo;
class Catalogo extends Model
{
    use HasFactory;
    protected $primaryKey = 'cod_catalogo';
    protected $table = 'catalogo';

    protected $fillable = [  'cod_catalogo','cod_compra_cata','cod_producto_cata',
                            'cod_promocion_cat','lote','stock','fecha_vencimiento',
                            'precio_venta','precio_compra','cantidad_compra',
                            'precio_total','estado','created_at','update_at'
                        ];
    //relaciones 

    
    public function pedidos(){
        return $this->belongsToMany(Pedido::class,'pedido_catalogo','cod_catalogo_pcata', 'cod_pedido_pcata')
                    ->withPivot('cantidad', 'subtotal');
        //return $this->belongsToMany(,'cod_catalogo_pcata', 'cod_pedido_catalogo');
    }                    
}
