<?php
/**
 * union types: mais de um tipo de 
 * dado na passagem de parâmetro
 */
declare(strict_types=1);

// ex1
function soma_data($data_base, DateInterval|int $interval) {
    $date = new DateTime($data_base);
    if ($interval instanceof DateInterval)
        $date->add($interval);
    else
        $date->add( new DateInterval('P'.$interval.'D'));
    return $date->format('Y-m-d');
}

print soma_data( '2023-12-10', 5);
print "<br>\n";
print soma_data( '2023-12-10', new DateInterval('P12M'));

// ex2
class Turma {
    private int $id;
    private int $dia_semana;
    private int|string $sala;

    public function setNumeroSala(int|string $sala) {
        $this->sala = $sala;
    }
}
$t = new Turma;
$t->setNumeroSala( 100 );