<?php
namespace Livro\Control;

use Livro\Widgets\Base\Element;

class Page extends Element {
    public function __construct() {
        // page vai ser div
        parent::__construct('div');
    }

    public function show() {
        if ($_GET) {
            $method = isset($_GET['method']) ? $_GET['method'] : null;
        
            if ($method && method_exists($this, $method)) {
                // executa método passado em GET
                call_user_func( [$this, $method], $_REQUEST );
            }
        }
        // exibir tudo que tá dentro de Element
        parent::show();
    }
}