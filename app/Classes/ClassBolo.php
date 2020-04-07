<?php

namespace App\Classes;

class ClassBolo{
    public $tamanho;
    public $categoria;
    public $cobertura;
    public $formato;
    public $recheios = array();
    public $massa;
    public $topo;
    public $mensagem;
    public $total = 0;

    function __construct($tamanho, $categoria, $cobertura, $formato, $recheios, $massa, $topo, $mensagem){
        $this->tamanho = $tamanho;
        $this->categoria = $categoria;
        $this->cobertura = $cobertura;
        $this->formato = $formato;
        $this->recheios = $recheios;
        $this->massa = $massa;
        $this->topo = $topo;
        $this->mensagem = $mensagem;
        $this->total();
    }

    public function total(){
        $this->total = \App\Tamanho::find($this->tamanho)->preco;
        $this->total += \App\Cobertura::find($this->cobertura)->preco;
        $this->total += \App\Formato::find($this->formato)->preco;
        $this->total += \App\Massa::find($this->massa)->preco;
        $this->total += \App\Topo::find($this->topo)->preco;
        foreach($this->recheios as $recheio){
            $this->total += \App\Recheio::find($recheio)->preco;
        }
    }
}

?>