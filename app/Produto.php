<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //
    protected $fillable = ["nome","subtitulo", "categoria_id", "descricao", "destaque", "imagem_destaque"];

    public function categoria(){
        return $this->belongsTo("App\CategoriaProduto", "id", "categoria_id");
    }

    public function home_entrega(){
        return $this->belongsTo("App\Home", "produto_pronta_entrega", "id");
    }

    public function home_novo(){
        return $this->belongsTo("App\Home", "produto_novo", "id");
    }

    public function tamanhos(){
        return $this->hasMany("App\TamanhoProduto", "produto_id", "id");
    }

    public function sabores(){
        return $this->hasMany("App\SaborProduto", "produto_id", "id");
    }

    public function imagens(){
        return $this->hasMany("App\ImagemProduto", "produto_id", "id");
    }
}
