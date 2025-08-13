<?php
// percorrendo arquivo
$file = new SplFileObject('arquivo.txt');

// lendo com while
while (!$file->eof())
    print 'linha: ' . $file->fgets() . "<br>";

echo '<br>';

// lendo com foreach
foreach ($file as $linha => $conteudo)
    print "$linha: $conteudo";