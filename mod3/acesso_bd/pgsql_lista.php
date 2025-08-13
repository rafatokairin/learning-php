<?php
$conn = pg_connect ('host=localhost port=5432 dbname=livro user=postgres password=postgres');

$query = 'SELECT codigo, nome FROM famosos';

$result = pg_query($conn, $query);

if($result) {
    // pg_fetch_assoc() trás apenas uma consulta (row), portanto precisa de while
    while ($row = pg_fetch_assoc($result))
        print $row['codigo'] . ' - ' . $row['nome'] . '<br>';
}

pg_close( $conn );