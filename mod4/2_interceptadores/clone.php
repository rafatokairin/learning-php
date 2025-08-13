<?php
class Titulo4 {
    public $codigo, $dt_vencimento, $valor, $juros, $multa;

    // 8. __clone (escolhe o que vai ser atribuído quando clonado)
    public function __clone() {
        $this->codigo = null;
    }
}

$titulo = new Titulo4;
$titulo->codigo = 1;
$titulo->dt_vencimento = '2018-10-10';
$titulo->valor = 100;
$titulo->juros = 0.1;
$titulo->multa = 1;

// desse jeito está sendo passado o endereço de $titulo
$titulo2 = $titulo;
$titulo2->valor = 200;

// desse jeito está criando novo objeto e copiando para ele
$titulo2 = clone $titulo;
$titulo2->valor = 200;

var_dump($titulo) ;
