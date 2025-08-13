<?php
require_once 'dm/Produto.php';
require_once 'dm/Venda.php';
require_once 'dm/VendaMapper.php';

try {
    $p1 = new Produto;
    $p1->id = 1;
    $p1->preco = 12;
    
    $p2 = new Produto;
    $p2->id = 1;
    $p2->preco = 12;

    $venda = new Venda;
    $venda->addItem(15, $p1);
    $venda->addItem(20, $p2);

    $conn = new PDO("pgsql:dbname=produto;user=postgres;host=127.0.0.1;password=postgres");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    VendaMapper::setConnection($conn);
    VendaMapper::save($venda);
}
catch (Exception $e) {
    print $e->getMessage();
}