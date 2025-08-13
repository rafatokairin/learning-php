<?php
function monta_saudacao(string $saudacao, string $nome, string $sobrenome = '', string $tratamento = '') {
    $frase = '';
    $frase .= $saudacao;
    if ($tratamento)
        $frase .= ' ' . $tratamento;
    $frase .= ' ' . $nome;
    if ($sobrenome)
        $frase .= ' ' . $sobrenome;
    return $frase;
}

// print monta_saudacao('Olá', 'Maria', 'da Silva', 'Sra');
// print monta_saudacao('Boa tarde', 'Joana');
// print monta_saudacao('Boa noite', 'Pedro', '', 'Sr');
// print monta_saudacao(saudacao: 'Bom dia', nome: 'Rodrigo', tratamento: 'Sr');

// $args = [ 'saudacao' => 'Olá', 'nome' => 'Maria', 'tratamento' => 'Sra'];

// print monta_saudacao( ... $args );

print monta_saudacao('Olá', 'Maria', 'sa Silva', tratamento: 'Dra');