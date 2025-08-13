<?php
// Conta é a classe pai
require_once 'Conta.php';
require_once 'ContaCorrente.php';
require_once 'ContaPoupanca.php';

$p = new ContaPoupanca('100', '123123', 500);
echo $p->getSaldo() . '<br>';

$p->depositar(200);
echo $p->getSaldo() . '<br>';

$p->retirar(100);
echo $p->getSaldo() . '<br>';