<?php
// final class impede que alguém crie classe filha dela
final class ContaPoupanca extends Conta {
    public function retirar($quantia) {
        if ($this->saldo >= $quantia) 
            $this->saldo -= $quantia;
        else
            return false;
        return true;
    }
}