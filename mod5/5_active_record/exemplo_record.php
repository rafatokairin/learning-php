<?php
require_once '../4_conn_transacao/api/Connection.php';
require_once '../4_conn_transacao/api/Logger.php';
require_once '../4_conn_transacao/api/LoggerTXT.php';
require_once '../4_conn_transacao/api/Transaction.php';

try {
    Transaction::open('estoque');
    Transaction::setLogger(new LoggerTXT('novo.txt'));

    $p1 = new Produto;
    $p1->descricao = 'Cerveja artesanal IPA';
    $p1->estoque = 50;
    $p1->preco_custo = 8;
    $p1->preco_venda = 12;
    $p1->codigo_barras = '123123123';
    $p1->origem = 'N';
    $p1->store();

    $p2 = Produto::find(7);
    if ($p2)
        print $p2->descricao;

    Transaction::close();
}
catch (Exception $e) {
    Transaction::rollback();
    print $e->getMessage();
}