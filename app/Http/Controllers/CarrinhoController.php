<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\ClassProduto;
use App\Classes\ClassBolo;
use App\Pedido;
use App\ProdutoPedido;
use App\Produto;
use App\BoloPedido;
use App\RecheioBoloPedido;
use PagSeguro;

class CarrinhoController extends Controller
{
    //

    public function teste(){
        dd(session()->get("carrinho")->bolos);
    }

    public function checkout(){
        return view("site.page-checkout");
    }

    public function adicionarProduto(Request $request){
        $instProduto = new ClassProduto($request->pid, $request->tid, $request->sid);
        session()->get("carrinho")->addProduto($instProduto);
    }

    public function adicionarBolo(Request $request){
        $instBolo = new ClassBolo($request->tamanho, $request->categoria, $request->cobertura, $request->formato, $request->recheio, $request->massa, $request->topo, $request->mensagem);
        session()->get("carrinho")->addBolo($instBolo);
    }

    public function finalizar(Request $request){
        
        $pedido = new Pedido();
        $pedido->nome = $request->nome;
        $pedido->sobrenome = $request->sobrenome;
        $pedido->endereco = $request->rua . ", " . $request->numero . " - " . $request->cidade . "/" . $request->estado;
        $pedido->nascimento = $request->nascimento;
        $pedido->cpf = $request->cpf;
        $pedido->cidade = $request->cidade;
        $pedido->telefone = $request->telefone;
        $pedido->email = $request->email;
        if($request->agendado == "1"){
            $pedido->agendamento = $request->dataAgendamento;
        }else{
            $pedido->hora = $request->horaAgendamento;
        }
        $pedido->total = session()->get("carrinho")->total;
        $pedido->save();
        $dados["items"] = array();
        
        foreach(session()->get("carrinho")->produtos as $produto){
            $new_produto = new ProdutoPedido();
            $new_produto->pedido_id = $pedido->id;
            $new_produto->produto_id = $produto->produto;
            $new_produto->tamanho_id = $produto->tamanho;
            $new_produto->sabor_id = $produto->sabor;
            $new_produto->total = $produto->total;
            $new_produto->save();
            $prod = Produto::find($produto->produto);
            $dados["items"][] = [
                "id" => $new_produto->id,
                'description' => $prod->nome,
                'quantity' => '1',
                'amount' => $produto->total,
                'weight' => '1',
                'shippingCost' => '0',
                'width' => '1',
                'height' => '1',
                'length' => '1',
            ];
        }

        foreach(session()->get("carrinho")->bolos as $bolo){
            $new_bolo = new BoloPedido();
            $new_bolo->pedido_id = $pedido->id;
            $new_bolo->categoria_id = $bolo->categoria;
            $new_bolo->formato_id = $bolo->formato;
            $new_bolo->tamanho_id = $bolo->tamanho;
            $new_bolo->massa_id = $bolo->massa;
            $new_bolo->cobertura_id = $bolo->cobertura;
            $new_bolo->topo_id = $bolo->topo;
            $new_bolo->mensagem = $bolo->mensagem;
            $new_bolo->total = $bolo->total;
            $new_bolo->save();
            foreach($bolo->recheios as $recheio){
                $new_recheio = new RecheioBoloPedido();
                $new_recheio->recheio_id = $recheio;
                $new_recheio->bolo_id = $new_bolo->id;
                $new_recheio->save();
            }
            $dados["items"][] = [
                "id" => $new_bolo->id,
                'description' => "Bolo Personalizado",
                'quantity' => '1',
                'amount' => $bolo->total,
                'weight' => '1',
                'shippingCost' => '0',
                'width' => '1',
                'height' => '1',
                'length' => '1',
            ];
        }

        $dados["shipping"] = [
            'address' => [
                'postalCode' => $request->cep,
                'street' => $request->rua,
                'number' => $request->numero,
                'district' => $request->bairro,
                'city' => $request->cidade,
                'state' => $request->estado,
                'country' => 'BRA',
            ],
            'type' => 1,
            'cost' => 0.00,
        ];

        $dados["sender"] = [
            'email' => $request->email,
            'name' => $request->nome,
            'documents' => [
                [
                    'number' => $request->cpf,
                    'type' => 'CPF'
                ]
            ],
            'phone' => [
                'number' => $request->telefone,
                'areaCode' => '99',
            ],
            'bornDate' => $request->nascimento,
        ];

        $checkout = PagSeguro::checkout()->createFromArray($dados);
        $credentials = PagSeguro::credentials()->get();
        $information = $checkout->send($credentials);
        $pedido->codigo = $information->getCode();
        $pedido->link = $information->getLink();
        $pedido->status = "Aguardando Pagamento";
        $pedido->save();
        return redirect()->route("carrinho.confirmacao");
    }

    public function confirmacao(){
        return view("site.page-confirmacao");
    }
}
