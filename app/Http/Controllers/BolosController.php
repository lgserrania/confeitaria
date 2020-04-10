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

    public function atualizar_categoria(Request $request, $id){

        $categoria = Categoria::find($id);
        $categoria->fill($request->all());
        $categoria->save();
        return redirect()->back();

    }

    public function excluir_categoria(Request $request, $id){

        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect()->back();

    }

    public function salvar_tamanho(Request $request){

        $tamanho = new Tamanho($request->all());
        $tamanho->save();
        return redirect()->back();

    }

    public function atualizar_tamanho(Request $request, $id){

        $tamanho = Tamanho::find($id);
        $tamanho->fill($request->all());
        $tamanho->save();
        return redirect()->back();

    }

    public function excluir_tamanho(Request $request, $id){

        $tamanho = Tamanho::find($id);
        $tamanho->delete();
        return redirect()->back();

    }

    public function salvar_formato(Request $request){

        $formato = new Formato($request->all());
        $formato->save();
        return redirect()->back();

    }

    public function atualizar_formato(Request $request, $id){

        $formato = Formato::find($id);
        $formato->fill($request->all());
        $formato->save();
        return redirect()->back();

    }

    public function excluir_formato(Request $request, $id){

        $formato = Formato::find($id);
        $formato->delete();
        return redirect()->back();

    }

    public function salvar_massa(Request $request){

        $massa = new Massa($request->all());
        $massa->save();
        return redirect()->back();

    }

    public function atualizar_massa(Request $request, $id){

        $massa = Massa::find($id);
        $massa->fill($request->all());
        $massa->save();
        return redirect()->back();

    }

    public function excluir_massa(Request $request, $id){

        $massa = Massa::find($id);
        $massa->delete();
        return redirect()->back();

    }

    public function salvar_recheio(Request $request){

        $recheio = new Recheio($request->all());
        $recheio->save();
        return redirect()->back();

    }

    public function atualizar_recheio(Request $request, $id){

        $recheio = Recheio::find($id);
        $recheio->fill($request->all());
        $recheio->save();
        return redirect()->back();

    }

    public function excluir_recheio(Request $request, $id){

        $recheio = Recheio::find($id);
        $recheio->delete();
        return redirect()->back();

    }

    public function salvar_cobertura(Request $request){

        $cobertura = new Cobertura($request->all());
        $cobertura->save();
        return redirect()->back();

    }

    public function atualizar_cobertura(Request $request, $id){

        $cobertura = Cobertura::find($id);
        $cobertura->fill($request->all());
        $cobertura->save();
        return redirect()->back();

    }

    public function excluir_cobertura(Request $request, $id){

        $cobertura = Cobertura::find($id);
        $cobertura->delete();
        return redirect()->back();

    }

    public function salvar_topo(Request $request){

        $topo = new Topo($request->all());
        $topo->save();
        return redirect()->back();

    }

    public function atualizar_topo(Request $request, $id){

        $topo = Topo::find($id);
        $topo->fill($request->all());
        $topo->save();
        return redirect()->back();

    }

    public function excluir_topo(Request $request, $id){

        $topo = Topo::find($id);
        $topo->delete();
        return redirect()->back();

    }
}
