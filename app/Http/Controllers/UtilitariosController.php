<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mensagem;

class UtilitariosController extends Controller
{
    //
    public function calculadora(){
        return view("admin.calculadora.calculadora");
    }

    public function mensagens(){
        $count_mensagens = DB::table("mensagems")->select("COUNT(assunto), assunto")->get();
        foreach($count_mensagens as $count){
            echo $count;
        }
        die();
        $mensagens = Mensagem::orderBy("created_at", "DESC")->get();
        return view("admin.mensagens.mensagens")->with("mensagens", $mensagens);
    }

    public function mensagem_lida($id){
        $mensagem = Mensagem::find($id);
        $mensagem->lida = '1';
        $mensagem->save();
        return response()->json("Mensagem lida", 200);
    }

    public function mensagens_categoria($categoria){
        $todas = Mensagem::all();
        $mensagens = $todas->where("assunto", "=", $categoria);
        return view("admin.mensagens.mensagens")->with("mensagens", $mensagens)
                                                ->with("todas", $todas);
    }
}
