<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\ClassProduto;
use App\Classes\ClassBolo;
use PagSeguro;

class CarrinhoController extends Controller
{
    //

    public function teste(){
        $data = [
            'items' => [
                [
                    'id' => '18',
                    'description' => 'Item Um',
                    'quantity' => '1',
                    'amount' => '1.15',
                    'weight' => '45',
                    'shippingCost' => '3.5',
                    'width' => '50',
                    'height' => '45',
                    'length' => '60',
                ],
                [
                    'id' => '19',
                    'description' => 'Item Dois',
                    'quantity' => '1',
                    'amount' => '3.15',
                    'weight' => '50',
                    'shippingCost' => '8.5',
                    'width' => '40',
                    'height' => '50',
                    'length' => '80',
                ],
            ],
            'shipping' => [
                'address' => [
                    'postalCode' => '06410030',
                    'street' => 'Rua Leonardo Arruda',
                    'number' => '12',
                    'district' => 'Jardim dos Camargos',
                    'city' => 'Barueri',
                    'state' => 'SP',
                    'country' => 'BRA',
                ],
                'type' => 2,
                'cost' => 30.4,
            ],
            'sender' => [
                'email' => 'gusouza980@gmail.com',
                'name' => 'Luis Gustavo de Souza Carvalho',
                'documents' => [
                    [
                        'number' => '11102165646',
                        'type' => 'CPF'
                    ]
                ],
                'phone' => [
                    'number' => '988461456',
                    'areaCode' => '35',
                ],
                'bornDate' => '1993-05-28',
            ]
        ];
        $checkout = PagSeguro::checkout()->createFromArray($data);
        $credentials = PagSeguro::credentials()->get();
        $information = $checkout->send($credentials);
        dd($information);
    }

    public function checkout(){
        return view("site.page-checkout");
    }

    public function adicionarProduto(Request $request){
        $instProduto = new ClassProduto($request->pid, $request->tid, $request->sid);
        session()->get("carrinho")->addProduto($instProduto);
    }

    public function adicionarBolo(Request $request){
        //dd($request->recheios);
        //return var_dump($request->all());
        $instBolo = new ClassBolo($request->tamanho, $request->categoria, $request->cobertura, $request->formato, $request->recheio, $request->massa, $request->topo, "");
        //return var_dump($instBolo);
        session()->get("carrinho")->addBolo($instBolo);
    }
}
