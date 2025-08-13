<?php
// pega array POST
$dados = $_POST;

if ($dados['id']) {
    $conn = pg_connect('host=localhost port=5432 dbname=livro user=postgres password=postgres');

    $id = (int) $dados['id'];
    $sql = "DELETE FROM pessoa WHERE id='{$id}'";
    
    $result = pg_query($conn, $sql);
    if ($result)
        print 'Registro excluído com sucesso';
    else
        print pg_last_error($conn);
    pg_close($conn);
}