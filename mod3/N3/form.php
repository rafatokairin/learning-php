<?php
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
        $conn = pg_connect ('host=localhost port=5432 dbname=livro user=postgres password=postgres');

        if ($_REQUEST['action'] == 'edit') {
            if (!empty($_GET['id'])) {
                // pega o id da URL
                $id = (int) $_GET['id'];
                $result = pg_query($conn, "SELECT * FROM pessoa WHERE id='{$id}'");
                // carrega para os parâmetros do vetor $pessoa
                $pessoa = pg_fetch_assoc($result);
            }
        }
        // insert ou update (submit)
        else if ($_REQUEST['action'] == 'save') {
            $id = $_POST['id'];
            $pessoa = $_POST;
        }
        // se id está vazio pega o próximo id do bd (insert)
        if (empty($_POST['id'])) {
            $result = pg_query($conn, "SELECT max(id) as next FROM pessoa");
            $row = pg_fetch_assoc($result);
            // pega maior valor do id + 1
            $next = (int) $row['next'] + 1;

            $sql = "INSERT INTO pessoa (id, nome, endereco, bairro, telefone, email, id_cidade)
                    VALUES ('{$next}', '{$pessoa['nome']}', '{$pessoa['endereco']}', '{$pessoa['bairro']}', '{$pessoa['telefone']}', '{$pessoa['email']}', '{$pessoa['id_cidade']}')";
            $result = pg_query($conn, $sql);
        }
        // update
        else {
            $sql = "UPDATE pessoa SET 
                                    nome = '{$pessoa['nome']}',
                                    endereco = '{$pessoa['endereco']}',
                                    bairro = '{$pessoa['bairro']}',
                                    telefone = '{$pessoa['telefone']}',
                                    email = '{$pessoa['email']}',
                                    id_cidade = '{$pessoa['id_cidade']}'
                                    WHERE id = '{$id}'";
            $result = pg_query($conn, $sql);
        }
        print ($result) ? 'Registro salvo com sucesso' : pg_last_error($conn);
        pg_close($conn);
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