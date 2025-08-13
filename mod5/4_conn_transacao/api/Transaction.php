<?php
require_once 'Connection.php';

class Transaction {
    private static $conn;
    private static $logger;

    private function __construct() {}

    public static function open($database) {
        self::$conn = Connection::open($database);
        // começando transação
        self::$conn->beginTransaction();
        self::$logger = null;
    }

    public static function close() {
        if (self::$conn) {
            self::$conn->commit();
            self::$conn = null;
        }
    }

    // retorna conexão aberta
    public static function get() {
        return self::$conn;
    }

    // método para desfazer a transação
    public static function rollback() {
        // verifica se tem conexão aberta
        if (self::$conn) {
            self::$conn->rollback();
            self::$conn = null;
        }
    }

    // método para variar tipo log (injeção de dependência)
    // padrão de projeto: strategy
    public static function setLogger(Logger $logger) {
        self::$logger = $logger;
    }

    public static function log($message) {
        // verificar se chamou setLogger antes
        if (self::$logger) {
            // chama o write da classe $logger
            self::$logger->write($message);
        }
    }
}