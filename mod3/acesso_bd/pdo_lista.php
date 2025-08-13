<?php
try {
    // cfg DSN
    $conn = new PDO('pgsql:dbname=livro; user=postgres; password=postgres; host=localhost');
    $conn->setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);

    // $result é um objeto
    $result = $conn->query("SELECT codigo, nome FROM famosos");
    if ($result) {
        /**
         * acessando como vetor:
         * foreach ($result as $row)
         *     print $row['codigo'] . ' - ' . $row['nome'] . '<br>';
         */

        /**
         * acessando como objeto:
         * while ($row = $result->fetch(PDO::FETCH_OBJ)) ou:
         */
        while ($row = $result->fetchObject())
            print $row->codigo . ' - ' . $row->nome . '<br>';
    }
    $conn = null;
}
catch (PDOException $e) {
    print $e->getMessage();
}
?>