<?php
class VendaMapper {
    private static $conn;

    public static function setConnection(PDO $conn) {
        self::$conn = $conn;
    }

    public static function save(Venda $venda) {
        $data = date('Y-m-d');
        $sql = "INSERT INTO venda (data_venda) values ('$data')";
        print $sql . "<br>";
        self::$conn->query($sql);

        $id = self::getLastId();
        $venda->setId($id);

        // perguntar quais objetos Produto tem e grava
        foreach ($venda->getItens() as $item) {
            $quantidade = $item[0];
            // objeto produto
            $produto = $item[1];
            $preco = $produto->preco;
        }

        $sql = "INSERT INTO item_venda (id_venda, id_produto, quantidade, preco)
                values ('{$id}', '{$produto->id}', '{$quantidade}', '{$preco}')";
    
        print $sql . '<br>';
        self::$conn->query($sql);
    }

    public static function getLastId() {
        $sql = "SELECT max(id) as max FROM venda";
        $result = self::$conn->query($sql);
        $data = $result->fetchObject();
        // retornando só a coluna em vez da linha inteira
        return $data->max;
    }
}