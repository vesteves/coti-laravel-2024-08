<?php
class Veiculo
{
    private $cor;
    private $marca;

    public function __construct($cor, $marca)
    {
        $this->cor = $cor;
        $this->marca = $marca;
    }

    public function detalharPedido()
    {
        echo "O veiculo da marca {$this->marca} e com cor {$this->cor} foi comprado!\n";
    }
}

class Carro extends Veiculo
{
    private $parabrisaQuebrado;

    public function __construct($parabrisaQuebrado)
    {
        $this->parabrisaQuebrado = $parabrisaQuebrado;
    }

    public function quebrarRetrovisores()
    {
        return $this->parabrisaQuebrado;
    }
}

class Moto extends Veiculo
{
    public function quebrarRetrovisores()
    {
        return true;
    }
}

$carro = new Carro("Vermelha", "Peugeot");
$carro->detalharPedido();
echo $carro->quebrarRetrovisores() . "\n";

$moto = new Moto("Preta", "Vulcan");
$moto->detalharPedido();
// echo $moto->quebrarRetrovisores() . "\n";
