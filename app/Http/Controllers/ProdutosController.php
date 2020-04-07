<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaProduto;
use App\TamanhoProduto;
use App\SaborProduto;
use App\ImagemProduto;
use App\Produto;
use Illuminate\Support\Facades\Storage;


class ProdutosController extends Controller
{
    //
    public function index(){
        $categorias = CategoriaProduto::all();
        return view("admin.produtos.variados")->with("categorias", $categorias)
                                                ->with("editar", false);
    }

    public function editar_produto($id){
        $produto = Produto::find($id);
        $categorias = CategoriaProduto::all();
        return view("admin.produtos.variados")->with("categorias", $categorias)
                                                ->with("produto", $produto)
                                                ->with("editar", true);
    }

    public function atualizar_produto(Request $request, $id){
        $produto = Produto::find($id);
        $produto->fill($request->all());
        $produto->save();
        return redirect()->route("painel.produtos.variados.editar", ["id" => $id]);
    }

    public function salvar_produto(Request $request){
        $produto = new Produto($request->all());
        $produto->save();
        return redirect()->route("painel.produtos.variados.editar", ["id" => $produto->id]);
    }

    public function excluir_produto($id){
        $produto = Produto::find($id);
        foreach($produto->imagens as $imagem){
            $imagem = ImagemProduto::find($imagem->id);
            Storage::disk('produtos')->delete($imagem->caminho);
            $imagem->delete();
        }
        $produto->delete();
        return redirect()->route("painel.produtos.variados");
    }

    public function salvar_tamanho(Request $request){
        $tamanho = new TamanhoProduto($request->all());
        $tamanho->save();
        return redirect()->back();
    }

    public function editar_tamanho(Request $request, $id){
        $tamanho = TamanhoProduto::find($id);
        $tamanho->fill($request->all());
        $tamanho->save();
        return redirect()->back();
    }

    public function excluir_tamanho($id){
        $tamanho = TamanhoProduto::find($id);
        $tamanho->delete();
        return redirect()->back();
    }

    public function salvar_imagem(Request $request){
        if($request->file("caminho")){
            Storage::disk('produtos')->delete($request->caminho);
            $imagem = new ImagemProduto();
            $imagem->produto_id = $request->produto_id;
            $imagem->caminho = $request->file("caminho")->store('images/produtos', ['disk' => 'produtos']);
            $imagem->save();
        }
        return redirect()->back();
    }

    public function excluir_imagem($id){
        $imagem = ImagemProduto::find($id);
        Storage::disk('produtos')->delete($imagem->caminho);
        $imagem->delete();
        return redirect()->back();
    }

    public function salvar_sabor(Request $request){
        $sabor = new SaborProduto($request->all());
        $sabor->save();
        return redirect()->back();
    }

    public function editar_sabor(Request $request, $id){
        $sabor = SaborProduto::find($id);
        $sabor->fill($request->all());
        $sabor->save();
        return redirect()->back();
    }

    public function excluir_sabor($id){
        $sabor = SaborProduto::find($id);
        $sabor->delete();
        return redirect()->back();
    }

    public function salvar_categoria(Request $request){
        $categoria = new CategoriaProduto($request->all());
        $categoria->save();
        return redirect()->back();
    }
}
