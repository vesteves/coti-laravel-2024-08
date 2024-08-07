<?php

class Pessoa
{
    public $nome;

    public function andar()
    {
        echo "A pessoa " . $this->nome . " vai andar\n";
    }

    public function falar()
    {
        echo "A pessoa {$this->nome} sabe falar!\n";
    }
}

$pessoa1 = new Pessoa();
$pessoa1->nome = "Vitor";
$pessoa1->falar();

$pessoa2 = new Pessoa();
$pessoa2->andar();

$pessoa1->andar();
