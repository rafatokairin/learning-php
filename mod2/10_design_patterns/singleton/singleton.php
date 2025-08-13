<?php

require_once 'Preferencias.php';

// são o mesmo objeto (objeto global)
$p1 = Preferencias::getInstance();
$p2 = Preferencias::getInstance();

echo '<pre>';
var_dump($p1);
var_dump($p2);