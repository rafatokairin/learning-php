<?php
declare(strict_types=1);
class Estado {
    private string $nome;

    public function _construct(string $nome) {
        $this->nome = $nome;
    }

    public function getNome(): string {
        return $this->nome;
    }
}

class Cidade {
    private string $nome;
    
    // objeto pode ser null
    private ?Estado $estado;
    public function __construct(string $nome, Estado $estado = null) {
        $this->nome = $nome;
        $this->estado = $estado;
    }

    public function getEstado() {
        return $this->estado;
    }
}

/*
    $rs = new Estado('RS');
    $cid = new Cidade('Lajeado', $rs);
    print $cid->getEstado()->getNome();
*/

/*
    $cid = new Cidade('Lajeado');
    if ($cid->getEstado() instanceof Estado)
        print $cid->getEstado()->getNome();
    }
*/

$cid = new Cidade('Lajeado');

/**
 * faz a mesma coisa que o if em cima,
 * porém se o encadeamento for maior,
 * impede muitos ifs
 */
print $cid->getEstado()?->getNome();

$pessoa->getCidade()?->getEstado()?->getPais()?->getNome();