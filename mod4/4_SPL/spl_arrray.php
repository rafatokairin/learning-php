<?php
$dados = ['salmão', 'tilapia', 'sardinha', 'badejo' , 'pescada', 'dourado', 'corvina', 'cavala', 'bagre'];

$objarray = new ArrayObject( $dados );

$objarray->append('bacalhau');

// pega valor posição 2
print $objarray->offsetGet(2) . '<br>';
$objarray->offsetSet(2, 'linguado');
print $objarray->count() . '<br>';
$objarray->offsetUnset(4);

if ($objarray->offsetExists(10)) {
    print 'Posicao 10 encontrada <br>';
}
else {
    print 'Posicao 10 nao encontrada <br>';
}

$objarray[] = 'atum';
$objarray->natsort();

// igual usar serialize($dados);
print $objarray->serialize();

foreach ($objarray as $item)
    print 'Item: ' . $item . '<br>';