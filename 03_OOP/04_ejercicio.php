<?php

interface SerieDeNumeros
{
    public function getSiguiente();
    public function reiniciar();
    public function setComenzar($valor);
}

class DeDos implements SerieDeNumeros
{
    public $iniciar;
    public $valor;

    public function __construct($iniciar, $valor)
    {
        $this->iniciar = $iniciar;
        $this->valor = $valor;
    }

    public function getAnterior()
    {
        return $this->valor -= 2;
    }

    public function getSiguiente()
    {
        return $this->valor += 2;
    }

    public function setComenzar($valor)
    {
        $this->iniciar = $valor;
        $this->valor = $valor;
        return $this->valor;
    }

    public function reiniciar()
    {
        return $this->valor = $this->iniciar;
    }

    public static function tipoDeSerie()
    {
        echo "Esta es una serie de 2" . "<br>";
    }
}

echo "<h1>Serie de 2</h1>";
$serieDe2 = new DeDos(0, 0);
$serieDe2->tipoDeSerie();
echo $serieDe2->setComenzar(30) . "<br>";
echo $serieDe2->getSiguiente() . "<br>";
echo $serieDe2->getSiguiente() . "<br>";
echo $serieDe2->getSiguiente() . "<br>";
echo $serieDe2->getSiguiente() . "<br>";
echo $serieDe2->getSiguiente() . "<br>";
echo $serieDe2->getAnterior() . "<br>";
echo $serieDe2->getAnterior() . "<br>";
echo $serieDe2->getAnterior() . "<br>";
echo $serieDe2->reiniciar() . "<br>";

class DeTres implements SerieDeNumeros
{
    public $iniciar;
    public $valor;

    public function __construct($iniciar, $valor)
    {
        $this->iniciar = $iniciar;
        $this->valor = $valor;
    }

    public function getAnterior()
    {
        return $this->valor -= 3;
    }

    public function getSiguiente()
    {
        return $this->valor += 3;
    }

    public function setComenzar($valor)
    {
        $this->iniciar = $valor;
        $this->valor = $valor;
        return $this->valor;
    }

    public function reiniciar()
    {
        return $this->valor = $this->iniciar;
    }

    public static function tipoDeSerie()
    {
        echo "Esta es una serie de 3" . "<br>";
    }
}

echo "<h1>Serie de 3</h1>";
$serieDe3 = new DeTres(0, 0);
$serieDe3->tipoDeSerie();
echo $serieDe3->setComenzar(21) . "<br>";
echo $serieDe3->getSiguiente() . "<br>";
echo $serieDe3->getSiguiente() . "<br>";
echo $serieDe3->getSiguiente() . "<br>";
echo $serieDe3->getSiguiente() . "<br>";
echo $serieDe3->getSiguiente() . "<br>";
echo $serieDe3->getAnterior() . "<br>";
echo $serieDe3->getAnterior() . "<br>";
echo $serieDe3->getAnterior() . "<br>";
echo $serieDe3->reiniciar() . "<br>";
