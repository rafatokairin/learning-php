<?php

class Produto {
    /**
     * se eu jogar a visibilidade para os 
     * parametros do construtor nao preciso 
     * declarar os atributos, nem atribuir 
     * os valores no constructor
     */
    // private string $descricao;
    // private float $estoque;
    // private float $preco;

    public function __construct(private string $descricao, private float $estoque, private float $preco) {
        // $this->descricao = $descricao;
        // $this->estoque = $estoque;
        // $this->preco = $preco;
    }

    public function setDescricao($descricao) {
        if (is_string($descricao))
            $this->descricao = $descricao;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setEstoque($estoque) {
        if (is_numeric($estoque))
            $this->estoque = $estoque;
    }

    public function getEstoque() {
        return $this->estoque;
    }

    public function setPreco($preco) {
        if (is_numeric($preco))
            $this->preco = $preco;
    }

    public function getPreco() {
        return $this->preco;
    }

    // quando termina a exec, destruct é chamado
    public function __destruct() {
        echo "DESTRUIDO: Objeto {$this->getDescricao()}<br>";
    }
}

$p1 = new Produto('Chocolate', 10, 5);
/*
    $p1->setDescricao('Chocolate');
    $p1->setEstoque(10);
    $p1->setPreco(5);
*/

print $p1->getDescricao();

// desalocar mem
unset($p1);