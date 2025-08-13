<?php
require_once 'CSVParser.php';

$csv = new CSVParser('clientes.csv', ';');

// catch captura o lançamento
try {
    $csv->parse();
    echo '<pre>';

    while ($row = $csv->fetch()) {
        var_dump($row);
    }
}
catch (Exception $e) {
    print $e->getMessage();
}