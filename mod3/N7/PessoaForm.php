<?php
require_once 'classes/Pessoa.php';
require_once 'classes/Cidade.php';

class PessoaForm {
    private $html;
    private $data;
    // vai carregar o html em memória para ser exibido
    public function __construct() {
        $this->html = file_get_contents('html/form.html');
        // variáveis do formulário (null se não for edit)
        $this->data = [ 'nome' => null,
                        'id' => null,
                        'endereco' => null,
                        'bairro' => null,
                        'telefone' => null,
                        'email' => null,
                        'id_cidade' => null
        ];

        $cidades = '';
        foreach (Cidade::all() as $cidade) {
            $cidades .= "<option value='{$cidade['id']}'> {$cidade['nome']} </option>";
        }
        $this->html = str_replace('{cidades}', $cidades, $this->html);
    }
    
    // $param carrega parâmetros da URL
    public function edit($param) {
        try {
            // ao clicar em editar grava os dados do db em data
            $id = (int) $param['id'];
            $this->data = Pessoa::find($id);
        }
        catch (Exception $e) {
            print $e->getMessage();
        }
    }

    public function save($param) {
        try {
            Pessoa::save($param);
            $this->data = $param;
            print "Pessoa salva com sucesso";
        }
        catch (Exception $e) {
            print $e->getMessage();
        }
    }

    // exibe html
    public function show() {
        // substituir variáveis caso edite
        $this->html = str_replace('{id}', (string) $this->data['id'], $this->html);
        $this->html = str_replace('{nome}', (string) $this->data['nome'], $this->html);
        $this->html = str_replace('{endereco}', (string) $this->data['endereco'], $this->html);
        $this->html = str_replace('{bairro}', (string) $this->data['bairro'], $this->html);
        $this->html = str_replace('{telefone}', (string) $this->data['telefone'], $this->html);
        $this->html = str_replace('{email}', (string) $this->data['email'], $this->html);
        $this->html = str_replace('{id_cidade}', (string) $this->data['id_cidade'], $this->html);
        
        $this->html = str_replace(  "option value='{$this->data['id_cidade']}'",
                                    "option selected=1 value='{$this->data['id_cidade']}'",
                                    $this->html);
        print $this->html;
    }
}