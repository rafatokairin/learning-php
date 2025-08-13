<?php
    require_once 'classes/Cidade.php';
    require_once 'classes/Pessoa.php';
    // criando vetor para reduzir código
    $pessoa = [];
    $pessoa['id'] = '';
    $pessoa['nome'] = '';
    $pessoa['endereco'] = '';
    $pessoa['bairro'] = '';
    $pessoa['telefone'] = '';
    $pessoa['email'] = '';
    $pessoa['id_cidade'] = '';

    // $_REQUEST pega GET e POST (save e edit) para listar
    if (!empty($_REQUEST['action'])) {
        try {
            // editar apenas carrega dados
            if ($_REQUEST['action'] == 'edit') {
                if (!empty($_GET['id'])) {
                    $id = (int) $_GET['id'];
                    $pessoa = Pessoa::find($id);
                }
            }

            // insert ou update (submit)
            else if ($_REQUEST['action'] == 'save') {
                // pega o id da URL
                $id = $_POST['id'];
                $pessoa = $_POST;
                
                Pessoa::save($pessoa);

                print 'Registro salvo com sucesso';
            }
        }
        catch (Exception $e) {
            print $e->getMessage();
        }
    }
    
    $cidades = '';
    foreach (Cidade::all() as $cidade) {
        $id = $cidade['id'];
        $nome = $cidade['nome'];

        $check = ($cidade['id'] == $pessoa['id_cidade' ]) ? 'selected=1' : '';
        $cidades .= "<option {$check} value='{$id}'> {$nome} </option>";
    }

    // fazer replace html
    $form = file_get_contents('html/form.html');
    $form = str_replace('{id}', $pessoa['id'], $form);
    $form = str_replace('{nome}', $pessoa['nome'], $form);
    $form = str_replace('{endereco}', $pessoa['endereco'], $form);
    $form = str_replace('{bairro}', $pessoa['bairro'], $form);
    $form = str_replace('{telefone}', $pessoa['telefone'], $form);
    $form = str_replace('{email}', $pessoa['email'], $form);
    $form = str_replace('{id_cidade}', $pessoa['id_cidade'], $form);
    $form = str_replace('{cidades}', $cidades, $form);

    // exibir formulário html
    print $form;
?>