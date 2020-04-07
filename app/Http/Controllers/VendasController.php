<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendasController extends Controller
{
    //
    public function dados(){
        return view("admin.vendas.dados");
    }
}
