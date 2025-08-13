<?php
    require_once 'db/db.php';    
    // primeiro deleta, depois faz a listagem (select)
    if (!empty($_GET['action']) && $_GET['action'] == 'delete') {
        $id = (int) $_GET['id'];
        exclui_pessoa($id);
    }
    
    $pessoas = lista_pessoas();

    $itens = '';
    // concatenar cada item em itens
    if ($pessoas) {
        // *obs: se colocar ; no foreach (); ele retorna último resultado do loop
        foreach ($pessoas as $pessoa) {
            $item = file_get_contents('html/item.html');
            $item = str_replace('{id}', $pessoa['id'], $item);
            $item = str_replace('{nome}', $pessoa['nome'], $item);
            $item = str_replace('{endereco}', $pessoa['endereco'], $item);
            $item = str_replace('{bairro}', $pessoa['bairro'], $item);
            $item = str_replace('{telefone}', $pessoa['telefone'], $item);

            $itens .= $item;
        }
    }
    $list = file_get_contents('html/list.html');
    $list = str_replace('{itens}', $itens, $list);

    // exibir html
    print $list;
?>
