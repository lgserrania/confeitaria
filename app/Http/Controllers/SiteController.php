<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaProduto;
use App\Produto;
use App\Bolo;
use App\Home;
use App\Sobre;
use App\Foto;
use App\Contato;

class SiteController extends Controller
{
    //
    public function index(){
        $home = Home::all()->first();
        return view("site.index")->with("home", $home);  
    }

    public function sobre(){
        $sobre = Sobre::first();
        return view("site.page-aconfeitaria")->with("sobre", $sobre);
    }

    public function produtos(){
        $produtos = Produto::orderBy("nome","ASC")->get();
        return view("site.page-products-list")->with("produtos", $produtos);
    }

    public function produtos_categoria($slug){
        $categoria = CategoriaProduto::where("slug",$slug)->first();
        $produtos = $categoria->produtos;
        return view("site.page-products-list")->with("produtos", $produtos);
    }

    public function contato(){
        $contato = Contato::first();
        return view("site.page-contact")->with("contato", $contato);
    }

    public function galeria(){
        $fotos = Foto::all();
        return view("site.page-galeria")->with("fotos", $fotos);
    }
}
