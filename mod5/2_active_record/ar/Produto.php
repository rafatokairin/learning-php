<?php

class Produto {
    private $data;
    private static $conn;

    public static function setConnection(PDO $conn) {
        self::$conn = $conn;
    }

    public function __get($prop) {
        return $this->data[$prop];
    }

    public function __set($prop, $value) {
        $this->data[$prop] = $value;
    }

    // métodos persistência
    public static function find($id) {
        $sql = "SELECT * FROM produto WHERE id='$id'";
        print " $sql <br>";
        $result = self::$conn->query($sql);
        /**
         * __CLASS__ é constante mágica que representa
         * a própria classe, ou seja vai retornar vetor
         * de objeto de Produto
         */
        return $result->fetchObject( __CLASS__ );
    }

    public static function all($filter = '') {
        $sql = "SELECT * FROM produto ";
        if ($filter)
            $sql .= " WHERE $filter ";
        print " $sql <br>";
        $result = self::$conn->query($sql);
        return $result->fetchAll( PDO::FETCH_CLASS, __CLASS__ );
    }

    public function delete() {
        // usa this pois está dentro da classe em data
        $sql = "DELETE FROM produto WHERE id='{$this->id}'";
        print " $sql <br>";
        // método da classe PDO (query())
        return self::$conn->query($sql);
    }

    public function save() {
        if (empty($this->data['id'])) {
            $id = $this->getLastId() + 1;
            $sql = "INSERT INTO produto (id, descricao, estoque, preco_custo, 
                    preco_venda, codigo_barras, data_cadastro, origem) VALUES 
                    ('{$id}', '{$this->descricao}', '{$this->estoque}', '{$this->preco_custo}', 
                    '{$this->preco_venda}', {$this->codigo_barras}', {$this->data_cadastro}', 
                    {$this->origem}')";
        }
        else {
            $sql = "UPDATE produto SET descricao = '{$this->descricao}',
                                        estoque = '{$this->estoque}',
                                        preco_custo = '{$this->preco_custo}',
                                        preco_venda = '{$this->preco_venda}',
                                        codigo_barras = {$this->codigo_barras}',
                                        data_cadastro = {$this->data_cadastro}',
                                        origem = {$this->origem}' WHERE id = '{$this->id}'";
        }
        print " $sql <br>";
        return self::$conn->exec($sql);
    }

    public function getLastId() {
        $sql = "SELECT max(id) as max FROM produto";
        $result = self::$conn->query($sql);
        $data = $result->fetchObject();
        // retornando só a coluna em vez da linha inteira
        return $data->max;
    }

    // métodos negócio
    public function getMargemLucro() {
        return (($this->preco_venda - $this->preco_custo) / $this->preco_custo) * 100;
    }

    public function registraCompra($custo, $quantidade) {
        $this->preco_custo = $custo;
        $this->estoque += $quantidade;
    }
}