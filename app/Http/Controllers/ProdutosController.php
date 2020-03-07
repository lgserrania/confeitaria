<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    //

    public function bolos(){
        return view("admin.produtos.bolos");
    }

    public function variados(){
        return view("admin.produtos.variados");
    }
}
