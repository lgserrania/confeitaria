<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagseguroController extends Controller
{
    //
    public function redirect(){
        return view("site.index");
    }

    public function notification(){
        return view("site.index");
    }
}
