<?php
require_once 'ar/Produto.php';

try {
    $conn = new PDO("pgsql:dbname=produto;user=postgres;host=127.0.0.1;password=postgres");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    Produto::setConnection($conn);
    $produtos = Produto::all();

    foreach ($produtos as $produto) {
        print $produto->descricao;
    }

    $produto = new Produto;
    $produto->descricao = 'Vinho';
    $produto->estoque = 10;
    $produto->preco_custo = 12;
    $produto->preco_venda = 18;
    $produto->codigo_barras = '123123123';
    $produto->data_cadastro = date('Y-m-d');
    $produto->origem = 'N';
    $produto->save();

    $outro = Produto::find(1);
    print 'Descrição: ' . $outro->descricao . '<br>';
    print 'Descrição: ' . $outro->descricao . '<br>';
    $outro->registraCompra(14, 5);
    $outro->save();
}
catch (Exception $e) {
    print $e->getMessage();
}