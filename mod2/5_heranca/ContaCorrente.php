<?php

class ContaCorrente extends Conta {
    protected $limite;

    public function __construct($agencia, $conta, $saldo, $limite) {
        // chama o método construtor da classe pai
        parent::__construct($agencia, $conta, $saldo);
        $this->limite = $limite;
    }

    /**
     * final não permite que o método seja
     * redefinido em classes filhas, não
     * da pra criar método com mesmo nome
     * na classe filha
     */
    public final function retirar($quantia) {
        if ($this->saldo + $this->limite >= $quantia) 
            $this->saldo -= $quantia;
        else
            return false;
        return true;
    }
}