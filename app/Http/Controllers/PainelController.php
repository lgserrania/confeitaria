<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PainelController extends Controller
{
    //
    public function index(){
        return view("admin.index");
    }

    public function page_manager(){
        return view("admin.page_manager");
    }
}
