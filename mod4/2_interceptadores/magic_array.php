<?php
/**
 * gravar todos atributos dentro de um vetor
 * e ficar encapsulado dentro uma única variável
 * *vantagem: fica fácil de exportar ou converter
 */
class Titulo2 {
    private $data;

    public function __set($propriedade, $valor) {
        $this->data[$propriedade] = $valor;
    }

    // printar variável
    public function __get($propriedade) {
        return $this->data[$propriedade];
    }

    // 5. isset (verifica se existe dentro da classe)
    public function __isset($propriedade) {
        return isset($this->data[$propriedade]);
    }

    // 6. unset (define como vai desalocar)
    public function __unset($propriedade) {
        unset($this->data[$propriedade]);
    }

    public function __toString() {
        // converte array em json
        return json_encode($this->data);
    }
}

$tit = new Titulo2;
// se eu executo sem o set ele grava a variável como pública
$tit->valor = 100;

// se eu não tivesse o __isset não printaria
if (isset($tit->valor))
    print "Tem valor";

// vai chamar __unset
unset($tit->valor);

echo $tit->valor;
echo '<pre>';
var_dump($tit);