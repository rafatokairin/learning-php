<?php

class Orcamento {
    private $itens;

    /**
     * forçar o Produto gera acoplamento
     * forte, forçar OrcavelInterface gera
     * acoplamento fraco
     */
    /**
     * permite mandar qualquer objeto que implemente OrcavelInterface
     */
    public function adiciona(OrcavelInterface $item, $qtde) {
        $this->itens[] = [$qtde, $item];
    }

    public function calculaTotal() {
        $total = 0;
        foreach ($this->itens as $item) {
            $total += ($item[0] * $item[1]->getPreco());
        }
        return $total;
    }
}