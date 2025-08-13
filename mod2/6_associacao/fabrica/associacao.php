<?php

require_once 'Fabricante.php';
require_once 'Produto.php';

$p1 = new Produto('Chocolate', 10, 7);
$f1 = new Fabricante('Fabrica de chocolate', 'Rua tal', '123.456');

// atribuindo objeto em outro
$p1->setFabricante($f1);

/**
 * dá pra fazer um encadeamento de
 * objeto por objeto até o metodo
 */
$descricao = $p1->getDescricao();
$nome_fabr = $p1->getFabricante()->getNome();

print "O fabricante do produto {$descricao} é {$nome_fabr}";

echo '<pre>';
var_dump($p1);
var_dump($f1);
echo '</pre>';