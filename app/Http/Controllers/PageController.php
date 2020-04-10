<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Home;
use App\Destaque;
use App\CategoriaProduto;
use App\Sobre;
use App\Foto;
use App\Contato;

class PageController extends Controller
{
    //
    public function index(){
        $categorias = CategoriaProduto::all();
        return view("admin.paginas.page-manager")->with("categorias", $categorias);
    }

    public function adiciona_imagem_categoria(Request $request, $id){
        $categoria = CategoriaProduto::find($id);
        if($request->file("imagem")){
            if($categoria->imagem){
                Storage::disk('produtos')->delete($categoria->imagem);
            }
            $categoria->imagem = $request->file("imagem")->store('images/home', ['disk' => 'produtos']);
        }
        $categoria->save();
        return redirect()->back();
    }

    public function categoria_destaque($id){
        $categoria = CategoriaProduto::find($id);
        if(!$categoria->imagem){
            session()->flash('erro', 'Por favor, adicione uma imagem à categoria antes de destaca-la.');
            return redirect()->back();
        }
        if($categoria->destaque == "0"){
            $categoria->destaque = 1;
        }else{
            $categoria->destaque = 0;
        }
        $categoria->save();
        return redirect()->back();
    }

    public function sobre(){
        $sobre = Sobre::first();
        return view("admin.paginas.page-manager-sobre")->with("sobre", $sobre);
    }

    public function salvar_sobre(Request $request){
        $sobre = Sobre::first();
        if(!$sobre)
            $sobre = new Sobre($request->all());
        else
            $sobre->fill($request->all());
        $sobre->save();
        return redirect()->back();
    }

    public function destaques(){
        $destaques = Destaque::all();
        return view("admin.paginas.page-manager-destaques")->with("destaques", $destaques);
    }

    public function novo_destaque(Request $request){
        $destaque = new Destaque;
        if($request->file("imagem")){
            $destaque->imagem = $request->file("imagem")->store('images/home', ['disk' => 'produtos']);
        }
        $destaque->titulo = $request->titulo;
        $destaque->subtitulo = ($request->subtitulo) ? $request->subtitulo : "";
        $destaque->opcao = $request->opcao;
        if($destaque->opcao == "produto"){
            $destaque->produto_id = $request->produto_id;
            $produto = \App\Produto::find($request->produto_id);
            $destaque->link = "/produtos#" . Str::slug($produto->nome);
            $destaque->texto_link = ($request->texto_link) ? $request->texto_link : "Compra já!";
        }elseif($destaque->opcao == "outros"){
            $destaque->texto_link = ($request->texto_link) ? $request->texto_link : "+";
            $destaque->link = ($request->link) ? $request->link : "";
        }
        $destaque->save();
        return redirect()->back();
    }

    public function atualiza_destaque(Request $request, $id){
        $destaque = Destaque::find($id);
        if($request->file("imagem")){
            if($destaque->imagem){
                Storage::disk('produtos')->delete($destaque->imagem);
            }
            $destaque->imagem = $request->file("imagem")->store('images/home', ['disk' => 'produtos']);
        }
        $destaque->titulo = $request->titulo;
        $destaque->subtitulo = ($request->subtitulo) ? $request->subtitulo : "";
        $destaque->opcao = $request->opcao;
        if($destaque->opcao == "produto"){
            $destaque->produto_id = $request->produto_id;
            $produto = \App\Produto::find($request->produto_id);
            $destaque->link = "/produtos#" . Str::slug($produto->nome);
            $destaque->texto_link = ($request->texto_link) ? $request->texto_link : "Compra já!";
        }elseif($destaque->opcao == "outros"){
            $destaque->texto_link = ($request->texto_link) ? $request->texto_link : "+";
            $destaque->link = ($request->link) ? $request->link : "";
        }
        $destaque->save();
        return redirect()->back();
    }

    public function excluir_destaque($id){
        $destaque = Destaque::find($id);
        if($destaque->imagem){
            Storage::disk('produtos')->delete($destaque->imagem);
        }
        $destaque->delete();
        return redirect()->back();
    }

    public function galeria(){
        $fotos = Foto::all();
        return view("admin.paginas.page-manager-galeria")->with("fotos", $fotos);
    }

    public function adicionar_foto(Request $request){
        $foto = new Foto;
        if($request->file("imagem")){
            $foto->imagem = $request->file("imagem")->store('images/galeria', ['disk' => 'produtos']);
        }
        $foto->save();
        return redirect()->back();
    }

    public function excluir_foto($id){
        $foto = Foto::find($id);
        if($foto->imagem){
            Storage::disk('produtos')->delete($foto->imagem);
        }
        $foto->delete();
        return redirect()->back();
    }

    public function contato(){
        $contato = Contato::first();
        return view("admin.paginas.page-manager-contato")->with("contato", $contato);
    }

    public function salvar_contato(Request $request){
        $contato = Contato::first();
        if(!$contato){
            $contato = new Contato;
        }
        $contato->telefone = $request->telefone;
        $contato->email = $request->email;
        $contato->save();

        return redirect()->back();
    }
}
