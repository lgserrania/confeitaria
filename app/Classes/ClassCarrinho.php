<?php

namespace App\Classes;

class ClassCarrinho{
    public $id;
    public $produtos = array();
    public $bolos = array();
    public $total = 0;

    public function addProduto($produto){
        $this->produtos[] = $produto;
        $this->total += $produto->total;
    }

    public function addBolo($bolo){
        $this->bolos[] = $bolo;
        $this->total += $bolo->total;
    }
}

?>