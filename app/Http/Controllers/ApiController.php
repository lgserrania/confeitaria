<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProdutoPedido;
use App\BoloPedido;
use App\Pedido;

class ApiController extends Controller
{
    //
    public function pedidos(){
        // $produtos = ProdutoPedido::all();
        // $bolos = BoloPedido::all();
        // $cont = 0;
        $pedidos = Pedido::all();
        // $pedidos["produtos"] = array();
        // $pedidos["bolos"] = array();
        // foreach($produtos as $produto){
        //     $pedidos["produtos"][$cont] = $produto;
        //     $pedidos["produtos"][$cont]["produto"] = $produto->produto;
        //     $pedidos["produtos"][$cont]["sabor"] = $produto->sabor;
        //     $pedidos["produtos"][$cont]["tamanho"] = $produto->tamanho;
        // }
        // $cont = 0;
        // foreach($bolos as $bolo){
        //     $pedidos["bolos"][$cont] = $bolo;
        //     $pedidos["bolos"][$cont]["categoria"] = $bolo->categoria;
        //     $pedidos["bolos"][$cont]["mensagem"] = $bolo->mensagem;
        //     $cont++;
        // }
        echo json_encode($pedidos);
        // $pedidos["produtos"] = $produtos;
        // $pedidos["bolos"] = $bolos;
        //return response()->json(json_encode($pedidos), 200);
    }
}
