<?php
// fica mais limpo, não precisando passar o nome da classe
$al = new ApplicationLoader;
$al->register();

class ApplicationLoader {
    public function register() {
        spl_autoload_register( [$this, 'loadClass'] );
    }
    public static function loadClass($class) {
        if (file_exists("App/{$class}.php")) {
            require_once "App/{$class}.php";
            return TRUE;
        }
    }
}

var_dump(new Pessoa);