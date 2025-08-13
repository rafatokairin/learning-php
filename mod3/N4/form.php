<?php
    require_once 'db/db.php';
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

        // editar apenas carrega dados
        if ($_REQUEST['action'] == 'edit') {
            if (!empty($_GET['id'])) {
                $id = (int) $_GET['id'];
                $pessoa = get_pessoa($id);
            }
        }

        // insert ou update (submit)
        else if ($_REQUEST['action'] == 'save') {
            // pega o id da URL
            $id = $_POST['id'];
            $pessoa = $_POST;
            // se id está vazio pega o próximo id do bd (insert)
            if (empty($id)) {
                // pega maior valor do id + 1
                $pessoa['id'] = get_next_pessoa();
                $result = insert_pessoa($pessoa);
            }
            // update
            else {
                $result = update_pessoa($pessoa);
            }

            print ($result) ? 'Registro salvo com sucesso' : 'Problemas ao salvar';
        }
    }

    // passar parâmetro para função para retornar a cidade correta -->
    require_once 'lista_combo_cidades.php';
    $cidades = lista_combo_cidades( $pessoa['id_cidade'] );

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