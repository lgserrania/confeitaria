<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    //

    public function produto_entrega(){
        return $this->hasOne("App\Produto", "id", "produto_pronta_entrega");
    }

    public function produtoNovo(){
        return $this->hasOne("App\Produto", "id", "produto_novo");
    }
}
