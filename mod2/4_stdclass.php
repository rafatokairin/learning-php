<?php

$produto = new stdClass;
$produto->descricao = 'Chocolate' ;
$produto->estoque = 100;
$produto->preco = 7;

// cast array <--> object
$vetor1 = (array) $produto;

$vetor2 = [ 'descricao' => 'Café',
            'estoque' => 100,
            'preco' => 7 ];
$produto2 = (object) $vetor2;

echo '<pre>' ;
var_dump($vetor1);
var_dump($produto2);
echo '</pre>' ;

// passar valores de array com loop
$prod = [];
$prod['desc'] = 'Choc';
$prod['est'] = 10;
$prod['preco'] = 5;

$obj = new stdClass;

// igual: $obj = (object) $prod;
foreach ($prod as $chave => $valor)
    $obj->chave = $valor;