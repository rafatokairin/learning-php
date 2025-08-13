<?php

class Titulo3 {
    private $valor;
    private $vencimento;

    public function __construct($valor, $vencimento) {
        $this->valor = $valor;
        $this->vencimento = $vencimento;
    }

    // 7. toString imprime objeto
    public function __toString() {
        return "Valor: $this->valor, Vencimento: $this->vencimento";
    }
}

$tit = new Titulo(100, '2018-10-10');
// não consegue exibir objeto em formato string sem __toString
print $tit;