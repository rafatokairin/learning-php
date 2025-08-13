<?php

// carrega a classe caso exista (não precisando carregar vários require_once)
spl_autoload_register(function($class) {
    // classe precisa estar no mesmo diretório
    if (file_exists($class . '.php'))
        require_once $class . '.php';
});

// parâmetros URL class e method
$classe = isset($_REQUEST['class']) ? $_REQUEST['class'] : null;
// método pode ser null
$metodo = isset($_REQUEST['method']) ? $_REQUEST['method'] : null;

// verifica se existe classe e método
if (class_exists($classe)) {
    $pagina = new $classe( $_REQUEST );

    if (!empty($metodo) && method_exists($classe, $metodo)) {
        $pagina->$metodo( $_REQUEST );
    }
    $pagina->show();
}