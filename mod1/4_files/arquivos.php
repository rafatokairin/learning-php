<?php
// leitura
$handler = fopen ('teste. txt', 'r' ) ;
while ( !feof ($handler) ) {
    print fgets($handler, 4096);
    print '<br>';
}
fclose($handler);

// escrita
$handler = fopen ('teste2. txt' , 'w' ) ;
fwrite( $handler, 'linha 1' . PHP_EOL) ;
fwrite( $handler, 'linha 2' . PHP_EOL) ;
fwrite( $handler, 'linha 3' . PHP_EOL);
fclose( $handler );



// leitura (problema: lê arquivo todo)
print file_get_contents('/tmp/testes/teste.txt' );
// escrita
file_put_contents ('/tmp/testes/teste3.txt', "a \n b \n c");
// lê cada linha como elemento de um vetor
$arquivo = file('/tmp/testes/teste.txt' );
foreach ($arquivo as $linha)
    print $linha . '<br>';

// copia e cola
copy('/tmp/testes/teste.txt', '/tmp/testes/novo. txt');

// renomeia ou move arquivo
rename('/tmp/testes/novo.txt', '/tmp/testes/novo2.txt');

// remove arquivo
unlink('/tmp/testes/novo2.txt');

// verifica se arquivo existe
if (file_exists('/tmp/testes/teste.txt' ))
    echo 'arquivo teste. txt existe' ;

// cria diretório (0777 == permissões)
mkdir('/tmp/testes/novodir', 0777);

// remove diretório
rmdir ('/tmp/testes/novodir' );

// mostra arquivos do diretório
$arquivos = scandir('/tmp/testes') ;
foreach ($arquivos as $arquivo)
    print $arquivo . '<br>';