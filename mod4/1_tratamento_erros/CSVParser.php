<?php

class CSVParser {
    private $filename;
    private $separator;
    private $counter;
    private $data;
    private $header;

    public function __construct($filename, $separator = '') {
        $this->filename = $filename;
        $this->separator = $separator;
        // linha do arquivo lido
        $this->counter = 1;
    }

    public function parse() {
        // tratamento erro primitivo (retornando TRUE e FALSE)
        if (!file_exists($this->filename))
            // lança um objeto da classe Exception
            throw new Exception("Arquivo {$this->filename} não encontrado");
        if (!is_readable($this->filename))
            throw new Exception("Arquivo {$this->filename} não pode ser lido");

        // lê arquivo (cada linha uma posição do vetor)
        $this->data = file($this->filename);
        // pega header, primeira linha (quebra string usando separator)
        $this->header = str_getcsv($this->data[0], $this->separator);
        return TRUE;
    }

    // lê uma linha
    public function fetch() {
        // verifica se existe primeira linha depois do header
        if (isset($this->data[$this->counter])) {
            $row = str_getcsv($this->data[$this->counter++], $this->separator);
            foreach ($row as $key => $value) {
                // indexa pelo header
                $row[$this->header[$key]] = $value;
            }
            return $row;
        }
    }
}