<?php

class Product {
    /**
     * readonly não altera os valores,
     * só com inicialização no constructor
     */
    private readonly int $id;
    public $descricao;
    public $estoque;
    public $preco;

    public function aumentarEstoque($unidades) {
        if (is_numeric($unidades) && $unidades >= 0)
            $this->estoque += $unidades;
    }
}

$p1 = new Product;
$p1->descricao = 'Chocolate';
$p1->estoque = 10;
$p1->preco = 5;
$p1->aumentarEstoque(2);

print $p1->descricao;
echo '<pre>';
var_dump($p1);
print_r($p1);
echo '</pre>';