<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Bolo;

class SiteController extends Controller
{
    //
    public function index(){
        return view("site.index");  
    }

    public function sobre(){
        return view("site.page-aconfeitaria");
    }

    public function produtos(){
        $produtos = Produto::orderBy("nome","ASC")->get();
        return view("site.page-products-list")->with("produtos", $produtos);
    }
}
