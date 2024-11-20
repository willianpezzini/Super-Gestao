<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory;

    use SoftDeletes;

    // //Salva os dados em uma tabela com o nome no lucal correto.
    protected $table = 'clientes';

    // //Autoriza o recebimento dos parametros pela linha de comando no tinker.
    protected $fillable= ['id', 'nome' ];

    // public function produtos() {
    //     // return $this->hasMany('Model da tabela com registros relacionados', 'foreign_key', 'primary_key' )
    //     return $this->hasMany('App\Models\Item','fornecedor_id','id');
    
}
