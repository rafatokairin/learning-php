<?php
/**
 * se eu coloco abstract, eu nao posso
 * instanciar a classe pai, ela apenas
 * esta sendo usada para estruturar
 * classes filhas
 */
abstract class Conta {
    private $id;
    protected $agencia;
    protected $conta;
    protected $saldo;

    private $genero;
    // vetor const
    const GENEROS = ['M' => 'Masculino', 'F' => 'Feminino'];

    // se a letra for M retorna Masculino
    public function getNomeGenero() {
        return self::GENEROS[$this->genero];
    }

    /**
     * variável da classe (está sincronizada
     * com todos objetos instanciados)
     */
    // se não coloca nada na frente é public
    private static $contador;

    public function __construct($agencia, $conta, $saldo) {
        // sempre que instanciar soma 1
        self::$contador++;
        $this->id = self::$contador;

        $this->agencia = $agencia;
        $this->conta = $conta;
        if ($saldo > 0)
            $this->saldo = $saldo;
    }

    public function depositar($quantia) {
        if ($quantia > 0)
            $this->saldo += $quantia;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function getInfo() {
        return "Agencia {$this->agencia}, Conta {$this->conta}";
    }

    // obrigo que toda classe filha deve implementar esse método
    abstract function retirar($quantia);

    /**
     * static function (método de classe) permite 
     * eu acessar o método sem instanciar objeto, 
     * não permite usar this dentro do método, mas 
     * sim a variável de classe (static)
     */
    public static function getContador() {
        return self::$contador;
    }
}

// acessar o vetor inteiro de classe fora dela (sem self e public)
Conta::GENEROS;
Conta::GENEROS['F'];
// só se for public:
// Conta::$contador;

// static function permite eu acessar o método sem instanciar objeto
var_dump(Conta::getContador());

// cria lista dos métodos da classe
get_class_methods('Conta');
// cria lista indexada dos atributos do objeto
get_object_vars($objeto);
// mostra a classe
get_class($objeto);
// mostra classe pai
get_parent_class($objeto);
// verifica se objeto/classe é classe filha de uma classe pai
is_subclass_of($objeto, 'Conta');
is_subclass_of('ContaCorrente', 'Conta');
// verifica se método existe
method_exists($objeto, 'setNome');


function apresenta($nome) {
    print "Olá $nome";
}
$funcao = 'apresenta';
// permite chamar função por método
call_user_func($funcao, 'Pablo');


class Pessoa { 
    public static function apresenta($nome) {
        print "Olá $nome";
    }
}
$classe = 'Pessoa';
$metodo = 'apresenta';
call_user_func([$classe, $metodo], 'Pablo');

$obj = new Pessoa;
call_user_func([$obj, $metodo], 'Pablo');
