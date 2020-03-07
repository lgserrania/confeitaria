<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PedidosController extends Controller
{
    //
    public function controle(){
        return view("admin.pedidos.controle");
    }

    public function calendario(){
        return view("admin.pedidos.calendario");
    }
}
