<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaProduto extends Model
{
    //
    protected $fillable = ["nome"];

    public function produtos(){
        return $this->hasMany("App\Produto", "categoria_id", "id");
    }
}
