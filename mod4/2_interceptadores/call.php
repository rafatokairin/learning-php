<?php
class Titulo5 {
    public $codigo, $dt_vencimento, $valor, $juros, $multa;

    // 9. call (é chamado quando tenta acessar método inacessível)
    public function __call($method, $values) {
        // values vem no formato de array
        print "Você executou o método $method, com: " . implode(',', $values);
        // executando métodos do php dentro da classe
        return call_user_func($method, get_object_vars($this));
    }
}

$titulo = new Titulo5;
$titulo->codigo = 1;
$titulo->dt_vencimento = '2018-10-10';
$titulo->valor = 100;
$titulo->juros = 0.1;
$titulo->multa = 1;

echo '<pre>';
// vai cair no call e passar o método existente do php
$titulo->print_r();
echo '<br>';