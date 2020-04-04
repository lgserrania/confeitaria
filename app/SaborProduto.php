<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaborProduto extends Model
{
    //
    protected $fillable = ["nome", "preco", "produto_id"];

    public function produto(){
        return $this->belongsTo("App\Produto", "id", "produto_id");
    }
}
