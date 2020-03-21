<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $fillable = ["nome", "email", "telefone", "whatsapp", "rua", "cidade", "estado", "numero", "empresa", "facebook", "linkedin", "instagram", "notas"];
}
