<?php
// investiga propriedades da classe
require_once 'Veiculo.php';

$rc = new ReflectionClass('Automovel');

echo '<pre>';
print_r( $rc->getMethods() );
print_r( $rc->getProperties() );
print_r( $rc->getParentClass() );

echo '<br>';
foreach ($rc->getMethods() as $method) {
    print_r($method->getParameters());
    echo $method->getName() . '<br>';
}