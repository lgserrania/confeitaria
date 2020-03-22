<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Tamanho;
use App\Formato;
use App\Massa;
use App\Recheio;
use App\Cobertura;
use App\Topo;

class BolosController extends Controller
{
    //
    public function index(){
        return view("admin.produtos.bolos");
    }

    public function salvar_categoria(Request $request){

        $categoria = new Categoria($request->all());
        $categoria->save();
        return redirect()->back();

    }

    public function salvar_tamanho(Request $request){

        $tamanho = new Tamanho($request->all());
        $tamanho->save();
        return redirect()->back();

    }

    public function salvar_formato(Request $request){

        $formato = new Formato($request->all());
        $formato->save();
        return redirect()->back();

    }

    public function salvar_massa(Request $request){

        $massa = new Massa($request->all());
        $massa->save();
        return redirect()->back();

    }

    public function salvar_recheio(Request $request){

        $recheio = new Recheio($request->all());
        $recheio->save();
        return redirect()->back();

    }

    public function salvar_cobertura(Request $request){

        $cobertura = new Cobertura($request->all());
        $cobertura->save();
        return redirect()->back();

    }

    public function salvar_topo(Request $request){

        $topo = new Topo($request->all());
        $topo->save();
        return redirect()->back();

    }
}
