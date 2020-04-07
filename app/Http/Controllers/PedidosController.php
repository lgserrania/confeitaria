<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use PagSeguro;

class PedidosController extends Controller
{
    //
    public function controle(){
        $pedidos = Pedido::all();
        $credentials = PagSeguro::credentials()->get();
        return view("admin.pedidos.controle")->with("pedidos", $pedidos)
                                                ->with("credentials", $credentials);
    }

    public function detalhe($id){
        $pedido = Pedido::find($id);
        //$credentials = PagSeguro::credentials()->get();
        //dd($pedido->codigo, $credentials);
        //dd(PagSeguro::transaction()->get($pedido->codigo, $credentials));
        //$pedido = Pedido::find($id);
        return view("admin.pedidos.detalhes")->with("pedido", $pedido);
    }

    public function calendario(){
        return view("admin.pedidos.calendario");
    }

    public function mudar_status($id, $status){
        $pedido = Pedido::find($id);
        $pedido->status = $status;
        $pedido->save();
        return redirect()->back();
    }
}
