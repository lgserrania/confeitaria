<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recheio extends Model
{
    //
    protected $fillable = ["nome","preco"];

    public function bolos(){
        return $this->belongsToMany("App\BoloPedido", "recheio_bolo_pedidos", "recheio_id", "bolo_id");
    }
}
