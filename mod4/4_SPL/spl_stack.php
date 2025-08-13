<?php
$ingredientes = new SplStack();

// entra pilha
$ingredientes->push('Peixe');
$ingredientes->push ('Sal');
$ingredientes->push ('Limão');

foreach ($ingredientes as $item)
    print 'Item: ' . $item . '<br>';

print $ingredientes->count();
// sai pilha
print $ingredientes->pop();