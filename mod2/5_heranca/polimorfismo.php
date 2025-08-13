<?php
require_once 'Conta.php';
require_once 'ContaCorrente.php';
require_once 'ContaPoupanca.php';

$contas = [];
$contas[] = new ContaCorrente(1234, 'CC123', 100, 500);
$contas[] = new ContaPoupanca(1235, 'CC456', 100);

foreach ($contas as $conta) {
    // objetos de classes filhas são instâncias de classe pai
    if ($conta instanceof Conta) {
        print $conta->getInfo() . '<br>';
        print "-- Saldo atual: {$conta->getSaldo()} <br>";

        $conta->depositar(200);
        print "-- Depósito de 200 <br>";
        print "-- Saldo atual: {$conta->getSaldo()} <br>";
        // métodos com mesmo nome, mas agem diferente (polimorfismo)
        if ($conta->retirar(700))
            print "-- Retirada de 700 (OK) <br>";
        else
            print "-- Retirada de 700 (não permitida) <br>";
    }
}