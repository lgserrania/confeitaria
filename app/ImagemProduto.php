<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagemProduto extends Model
{
    //
    protected $fillable = ["caminho", "produto_id"];

    public function produto(){
        return $this->belongsTo("App\Produto");
    }
}
