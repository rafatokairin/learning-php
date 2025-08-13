<?php
require_once 'ar/Produto.php';
require_once 'api/Connection.php';
require_once 'api/Transaction.php';

try {
    // cria conexão
    Transaction::open('estoque');

    $produto = new Produto;
    $produto->descricao = 'Café torrado';
    $produto->estoque = 100;
    $produto->preco_custo = 4;
    $produto->preco_venda = 7;
    $produto->codigo_barras = '123123123' ;
    $produto->data_cadastro = date('Y-m-d') ;
    $produto->origem = 'N';
    $produto->save();

    // fecha conexão
    Transaction::close();
}
catch (Exception $e) {
    // se cair em excessão desfaz
    Transaction::rollback();
    print $e->getMessage();
}