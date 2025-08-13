<?php
require_once 'Record.php';

/**
 * criar inteface para garantir que
 * método export exista, independente
 * das classes, para não dar erro ao
 * mudar classe e não ter o método com
 * o mesmo nome
 */
interface ExporterInterface {
    public function export($data);
}

// implementar interface
class JSONExporter implements ExporterInterface {
    public function export($data) {
        return json_encode($data);
    }
}

class Pessoa extends Record {
    const TABLENAME = 'pessoas';

    /**
     * em vez de instanciar a classe, passamos
     * ela por parâmetro, reduzindo a dependência
     * entre classes forte
     */
    // antes:
    /*
        public function toJSON() {
            $je = new JSONExporter;
            return $je->export($this->data);
        }
    */
    // depois (injeção de dependência):
    // ExporterInterface garante que tem o método export()
    public function export(ExporterInterface $exporter) {
        return $exporter->export($this->data);
    }
}

$p = new Pessoa;
$p->nome = 'Maria';
$p->endereco = 'Rua Maria';
$p->numero = '123';
print $p->export( new JSONExporter );