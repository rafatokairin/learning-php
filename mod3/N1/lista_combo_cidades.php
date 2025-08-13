<?php
function lista_combo_cidades($id_cidade = null)
{
    $conn = pg_connect ('host=localhost port=5432 dbname=livro user=postgres password=postgres');
    
    $output = '';
    $result = pg_query($conn, 'SELECT id, nome FROM cidade');
    if ($result) {
        while ($row = pg_fetch_assoc($result)) {
            $id = $row['id'];
            $nome = $row['nome'];
            // percorre, quando acha o $id_cidade ele marca selected=1
            $check = ($id == $id_cidade) ? 'selected=1' : '';
            $output .= "<option {$check} value='{$id}'> $nome </option>";
        }
    }

    pg_close($conn);
    return $output;
}




