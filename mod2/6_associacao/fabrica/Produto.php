<?php

class Produto {
    // object fabricante
    private $fabricante;
    public function __construct(private $descricao, private $estoque, private $preco) {}

    public function getDescricao() {
        return $this->descricao;
    }
    // passando apenas objeto da classe Fabricante
    public function setFabricante(Fabricante $fabricante) {
        $this->fabricante = $fabricante;
    }
    // retorna objeto
    public function getFabricante() {
        return $this->fabricante;
    }
}