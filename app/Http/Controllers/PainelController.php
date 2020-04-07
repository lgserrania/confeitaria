<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class PainelController extends Controller
{
    //
    public function index(){
        return view("admin.index");
    }

    public function page_manager(){
        return view("admin.page_manager");
    }

    public function login(){
        if(session()->get("usuario")){
            return redirect()->route("painel.index");
        }
        return view("admin.login");
    }

    public function logar(Request $request){
        $usuario = Usuario::where("email",$request->email)->first();
        if(!$usuario){
            return redirect()->back();
        }
        if($usuario->senha == $request->senha){
            session(["usuario" => $usuario->email]);
            return redirect()->route("painel.index");
        }else{
            return redirect()->back();
        }
    }

    public function logout(){
        session()->forget('usuario');
        return redirect()->route("painel.login");
    }
}
