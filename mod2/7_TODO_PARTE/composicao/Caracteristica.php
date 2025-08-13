<?php

class Caracteristica {
    public function __construct(private $nome, private $valor) {}

    public function getNome() {
        return $this->nome;
    }

    public function getValor() {
        return $this->valor;
    }
}