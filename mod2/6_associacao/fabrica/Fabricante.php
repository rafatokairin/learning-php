<?php

class Fabricante {
    public function __construct(private $nome, private $endereco, private $documento) {}

    public function getNome() {
        return $this->nome;
    }
}