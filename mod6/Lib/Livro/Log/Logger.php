<?php
abstract class Logger {
    protected $filename;

    public function __construct($filename) {
        $this->filename = $filename;
        // limpa o arquivo antes de escrever
        file_put_contents($filename, '');
    }

    abstract function write($message);
}