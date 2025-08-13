<?php

class Cidade {
    // função do php8.4
    public private(set) string $nome;

    public function __construct(string $nome) {
        $this->nome = $nome;
    }
}

class Pessoa {
    public private(set) string $nome;
    public private(set) Cidade $cidade;

    public function _construct(string $nome, Cidade $cidade) {
        $this->nome = $nome;
        $this->cidade = $cidade;
    }
}

$c1 = new Cidade('Lajeado');
$p1 = new Pessoa('Maria', $c1);
print $p1->nome;
echo "<br>\n";
print $p1->cidade->nome;