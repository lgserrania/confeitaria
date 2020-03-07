<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilitariosController extends Controller
{
    //
    public function calculadora(){
        return view("admin.calculadora.calculadora");
    }

    public function mensagens(){
        return view("admin.mensagens.mensagens");
    }
}
