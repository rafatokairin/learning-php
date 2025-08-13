<?php
$path = '/var/www/html/testes';

// percorre diretório dentro de diretório
foreach (new RecursiveIteratorIterator(
new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS)) as $item) {
    print (string) $item . '<br>';
}

