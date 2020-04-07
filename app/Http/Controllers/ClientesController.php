<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClientesController extends Controller
{
    //
    public function contatos(){
        return view("admin.clientes.contatos")->with("clientes", Cliente::orderBy("nome", "ASC")->get());
    }

    public function salvar(Request $request){
        $cliente = new Cliente($request->all());
        $cliente->save();
        return redirect()->back();
    }

    public function deletar($id){
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->back();
    }

    public function atualizar(Request $request, $id){
        $cliente = Cliente::find($id);
        $cliente->fill($request->all());
        $cliente->save();
        return redirect()->back();
    }
}
