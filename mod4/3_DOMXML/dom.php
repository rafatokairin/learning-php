<?php
$dom = new DOMDocument('1.0', 'UTF-8');
$dom->formatOutput = true;

$bases = $dom->createElement('bases');
$base = $dom->createElement('base');
// coloca base dentro de bases
$bases->appendChild($base);

$atr = $dom->createAttribute('id');
$atr->value = '1';
// coloca id="1" em base
$base->appendChild($atr);

// coloca os elementos dentro das tags
$base->appendChild($dom->createElement('nome', 'teste'));
$base->appendChild($dom->createElement('host', '192.168.0.1'));
$base->appendChild($dom->createElement ('type', 'mysql'));
$base->appendChild($dom->createElement ('user', 'mary'));

$dom->saveXML($bases);