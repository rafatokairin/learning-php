<?php
try {
    // uniformaliza os cmds dos bancos
    $conn = new PDO('pgsql:dbname=livro; user=postgres; password=postgres; host=localhost');
    /**
     * diz como o PDO deve tratar o erro (exception ou warning),
     * se cai na exception, não executa os próximos comandos
     */
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (1, 'Erico Veríssimo')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (2, 'John Lennon')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (3, 'Mahatma Gandhi' )");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (4, 'Ayrton Senna' )");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (5, 'Charlie Chaplin' )");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (6, 'Anita Garibaldi')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (7, 'Mário Quintana')");

    $conn = null;
}
catch (PDOException $e) {
    print $e->getMessage();
}
?>