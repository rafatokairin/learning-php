<?php
$ingredientes = new SplQueue();

// entra fila
$ingredientes->enqueue('Peixe');
$ingredientes->enqueue ('Sal');
$ingredientes->enqueue ('Limão');

foreach ($ingredientes as $item)
    print 'Item: ' . $item . '<br>';

print $ingredientes->count();
// sai fila
print $ingredientes->dequeue();