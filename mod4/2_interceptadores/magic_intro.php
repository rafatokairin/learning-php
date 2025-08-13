<?php
// métodos mágicos
class Titulo {
    private $dt_vencimento;
    private $valor;

    // 1. construtor
    public function __construct($dt_vencimento, $valor) {
        $this->dt_vencimento = $dt_vencimento;
        $this->valor = $valor;
        print "Construtor <br>";
    }

    // 2. destrutor (chamado após unset)
    public function __destruct() {
        print "Destrutor <br>";
    }

    // 3. get (chama quando tenta acessar propriedade inacessível)
    public function __get($propriedade) {
        if ($propriedade == 'valor')
            return $this->$propriedade * 1.2;

        print "Tentou acessar a propriedade {$propriedade} <br>";
    }

    // 4. set (grava valor em propriedade inacessível)
    public function __set($propriedade, $conteudo) {
        if ($propriedade == 'valor')
            $this->$propriedade = $conteudo * 1.5;
    }

    public function setValor($valor) {
    }
}

$tit = new Titulo('2018-10-10', 100);
$tit->setValor(100);

// vai chamar o get (propriedade privada)
print $tit->valor;

// vai chamar o set
$tit->valor = 200;

unset($tit);