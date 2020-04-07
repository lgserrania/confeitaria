<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagseguroController extends Controller
{
    //
    public function redirect(){
        return view("site.page-confirmacao");
    }

    public function notification(){
        return view("site.index");
    }
}
