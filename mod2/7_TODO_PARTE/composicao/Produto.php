<?php

class Produto {
    // object fabricante
    private $fabricante;
    private $caracteristicas;
    public function __construct(private $descricao, private $estoque, private $preco) {
        $this->caracteristicas = [];
    }

    public function addCaracteristica($nome, $valor) {
        $this->caracteristicas[] = new Caracteristica($nome, $valor);
    }

    public function getCaracteristica() {
        return $this->caracteristicas;
    }

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