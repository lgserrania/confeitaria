<?php

namespace App\Classes;

class ClassProduto{

    public $produto;
    public $tamanho;
    public $sabor;
    public $total = 0;

    function __construct($produto,$tamanho, $sabor){
        $this->produto = $produto;
        $this->tamanho = $tamanho;
        $this->sabor = $sabor;
        $this->total();
    }

    public function total(){
        $this->total = \App\TamanhoProduto::find($this->tamanho)->preco;
        $this->total += \App\SaborProduto::find($this->sabor)->preco;
    }
}

?>