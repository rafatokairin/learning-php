<?php
// da pra passar função no match

$codigo = 9;
$status = match($codigo) {
    1 => 'Iniciado',
    2 => 'Em atendimento',
    3 => 'Finalizado',
    default => 'Nao encontrado'
};
print $status;