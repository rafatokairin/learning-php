<?php

require_once 'Cesta.php';
require_once 'Produto.php';

$c1 = new Cesta;
$p1 = new Produto('Chocolate', 10, 5);
$p2 = new Produto('Cafe', 100, 7);

$c1->addItem($p1);
$c1->addItem($p2);

// ou usar foreach ($c1->getItens() as $item) + $item->getDescricao()
echo '<pre>';
var_dump($c1);
echo '</pre>';
