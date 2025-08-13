<?php
// php8.4
class Pessoa {
    private string $pronome;
    // getter e setter
    public string $nome {
        get {
            return $this->pronome . '' . $this->nome;
        }
        set {
            if (strlen($value) === 0) 
                throw new Exception('Nome deve ter conteúdo');
            $this->nome = $value;
        }
    }

    public function _construct(string $pronome, string $nome) {
        $this->nome = $nome;
    }
}

try {
    $p1 = new Pessoa('', 'Maria');
    // get
    print $p1->nome;
    print "<br>\n";
    $p2 = new Pessoa('', '');
    // get
    print $p2->nome;
}
catch (Exception $e) {
    print $e->getMessage();
}


