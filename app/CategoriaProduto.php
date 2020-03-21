<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaProduto extends Model
{
    //
    protected $fillable = ["nome", "produto_id"];

    public function produto(){
        return $this->belongsTo("App\Produto");
    }
}
