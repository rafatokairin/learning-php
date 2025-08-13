<?php
require_once 'Record.php';

class Produto extends Record {
    const TABLENAME = 'produto';
}

$x = new Produto;
$x->preco = 10;
$x->nome = 'Chocolate';
print $x->save();
print $x->toJSON();