<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoloPedido extends Model
{
    //

    public function categoria(){
        return $this->hasOne("App\Categoria", "id", "categoria_id")
    }

    public function tamanho(){
        return $this->hasOne("App\Tamanho", "id", "tamanho_id")
    }
    
    public function massa(){
        return $this->hasOne("App\Massa", "id", "massa_id")
    }

    public function cobertura(){
        return $this->hasOne("App\Cobertura", "id", "cobertura_id")
    }

    public function topo(){
        return $this->hasOne("App\Topo", "id", "topo_id")
    }

    public function recheios(){
        return $this->hasMany("App\Recheio", "recheio_bolo_pedidos" , "bolo_id", "recheio_id")
    }

}
