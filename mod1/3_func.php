<?php

// variável global (ruim)
/*
$total = 0;
function km2milhas ($km) {
    global $total;
    $total += $km;
    return $km * 0.6;
}

echo km2milhas(100);
echo km2milhas(100);
echo km2milhas(100);
*/

// static retém o valor na função (bom)
function percorre ($km) {
    static $total;
    $total += $km;
    print "percorreu mais $km de $total<br>";
}
percorre(100);
percorre(100);
percorre(100);

var_dump($total) ;

// referencia variável
function incrementa (&$variavel, $valor) {
    $variavel += $valor;
}

$teste = 100;
incrementa($teste, 20);
var_dump($teste);

// vetor já é passado como endereço
$lista = ['a', 'c', 'b'] ;
sort ($lista);

// função lambda (anônima)
$remove_acento = function ($str) {
                    return str_replace( ['a', 'e', 'í', 'o', 'u'],
                                        ['a', 'e', 'i', 'o', 'u'],
                                        $str );

};
var_dump($remove_acento('bábébíbóbú'));

// passando função lambda como parâmetro
function teste($palavra, $funcao) {
    $palavra = $funcao($palavra);
    return strtoupper($palavra);
}
var_dump (teste('babébíbóbu', $remove_acento));