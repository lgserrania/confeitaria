<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecheioBoloPedido extends Model
{
    //
    public function recheio(){
        return $this->belongsTo("App\Recheio", "id", "recheio_id");
    }
}
