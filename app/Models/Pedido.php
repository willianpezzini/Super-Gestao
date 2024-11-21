<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function produtos() {
        // Relacionamento com nome padronizados, Produto corresponde aos Produtos
        // return $this->belongsToMany('App\Models\Produto', 'pedidos_produtos');


         // Relacionamento com nome DESpadronizados, Item corresponde aos Produtos
        return $this->belongsToMany('App\Models\Item', 'pedidos_produtos', 'pedido_id', 'produto_id');
    }
    
}
