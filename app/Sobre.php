<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sobre extends Model
{
    //
    protected $fillable = ["titulo_principal", "titulo_secundario", "subtitulo_principal", "texto"];
}
