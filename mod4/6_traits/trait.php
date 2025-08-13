<?php
require_once 'Record.php';

class Produto extends Record {
    const TABLENAME = 'produto';
    // é igual copiar os métodos e colar nessa classe
    use ObjectConversioTrait;
}

/**
 * usar trait para não colocar muitos 
 * métodos que não caracterizam Record,
 * (dá pra colocar o trait em outro arquivo)
 */
trait ObjectConversioTrait {
    public function toXML() {
        $xml = new SimpleXMLElement('<'.get_class($this).'/>');
        foreach ($this->data as $key => $value)
        {
            $xml->addChild($key, $value);
        }
        return $xml->asXML();
    }

    public function toJSON() {
        /**
         * dá pra acessar os atributos protected,
         * é como se estivesse incorporado
         */
        return json_decode($this->data);
    }
}