<?php

class Rectangulo
{
    public $base;
    public $altura;

    function __construct($base, $altura)
    {
        $this->base = $base;
        $this->altura = $altura;
    }

    function calcArea()
    {
        $area = $this->base * $this->altura;
        return round($area);
    }

    function calcPerimetro()
    {
        $perimetro = 2 * ($this->base + $this->altura);
        return round($perimetro);
    }

    function calcDiagonal()
    {
        $diagonal = sqrt(pow($this->base, 2) + pow($this->altura, 2));
        return round($diagonal);
    }
}
echo "RECTANGULO 1" . "<br>";
$rectangulo1 = new Rectangulo(10, 5);
echo $rectangulo1->calcArea() . "<br>";
echo $rectangulo1->calcPerimetro() . "<br>";
echo $rectangulo1->calcDiagonal() . "<br>";
echo "RECTANGULO 2" . "<br>";
$rectangulo2 = new Rectangulo(100, 77);
echo $rectangulo2->calcArea() . "<br>";
echo $rectangulo2->calcPerimetro() . "<br>";
echo $rectangulo2->calcDiagonal() . "<br>";
echo "RECTANGULO 3" . "<br>";
$rectangulo3 = new Rectangulo(2.5, 1.22);
echo $rectangulo3->calcArea() . "<br>";
echo $rectangulo3->calcPerimetro() . "<br>";
echo $rectangulo3->calcDiagonal();
