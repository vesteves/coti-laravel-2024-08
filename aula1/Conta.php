<?php

class Conta
{
    private $saldo = 0;

    public function depositar($valor)
    {
        $this->saldo = $this->saldo + $valor;
        return "Valor depositado com sucesso!\n";
    }

    public function retirar($valor)
    {
        $this->saldo = $this->saldo - $valor;
        return "Valor retirado com sucesso!\n";
    }

    public function obterSaldo()
    {
        return $this->saldo;
    }
}

$pessoa = new Conta();
// echo $pessoa->obterSaldo();
echo $pessoa->depositar(10);
echo $pessoa->obterSaldo() . "\n";
echo $pessoa->retirar(7);
echo $pessoa->obterSaldo() . "\n";
