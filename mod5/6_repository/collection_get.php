<?php
require_once '../4_conn_transacao/api/Connection.php';
require_once '../4_conn_transacao/api/Logger.php';
require_once '../4_conn_transacao/api/LoggerTXT.php';
require_once '../4_conn_transacao/api/Transaction.php';
require_once '../4_conn_transacao/ar/Produto.php';
require_once 'Criteria.php';
require_once 'Repository.php';
require_once '../5_active_record/Record.php';

try {
    Transaction::open('estoque');
    Transaction::setLogger(new LoggerTXT('novo.txt'));

    $criteria = new Criteria;
    $criteria->add('estoque', '>', 10);
    $criteria->add('origem', '=', 'N');

    $repository = new Repository('Produto');
    $produtos = $repository->load($criteria);

    if ($produtos) {
        foreach ($produtos as $produto) {
            print 'ID: ' . $produto->id;
            print ' - Descricao: ' . $produto->descricao;
            print ' - Estoque: ' . $produto->estoque;
            print '<br>';
        }
    }
    print 'Qtde: ' . $repository->count($criteria);
    Transaction::close();
}
catch (Exception $e) {
    Transaction::rollback();
    print $e->getMessage();
}