<?php

class Vehiculo
{
    public $matricula;
    public $potencia;
    public $velocidadMedia;

    public function __construct($matricula, $potencia, $velocidadMedia)
    {
        $this->matricula = $matricula;
        $this->potencia = $potencia;
        $this->velocidadMedia = $velocidadMedia;
    }

    public function calcularTiempo($velocidadMedia, $distancia)
    {
        $conversionVelocidad = ($velocidadMedia * 1000) / 3600;
        $conversionDistancia = $distancia * 1000;
        $tiempoEnSegundos = $conversionDistancia / $conversionVelocidad;
        $tiempoEnMinutos = $tiempoEnSegundos / 60;

        if ($tiempoEnMinutos >= 60) {
            $tiempoEnHoras = $tiempoEnMinutos / 60;
            echo "Tiempo estimado: $tiempoEnHoras horas" . "<br>";
        } else {
            echo "Tiempo estimado: $tiempoEnMinutos minutos" . "<br>";
        }
    }

    public function printNombre()
    {
        echo "Matrícula: {$this->matricula}" . "<br>";
    }
}

class Terreste extends Vehiculo
{

    public $numRuedas;
    public $capacidadMaletero;
    public $railesCarretera;
    public function __construct($matricula, $potencia, $velocidadMedia, $numRuedas, $capacidadMaletero, $railesCarretera)
    {
        parent::__construct($matricula, $potencia, $velocidadMedia);
        $this->numRuedas = $numRuedas;
        $this->capacidadMaletero = $capacidadMaletero;
        $this->railesCarretera = $railesCarretera;
    }
}

class Maritimo extends Vehiculo
{
    public $esloraTotal;
    public $esloraFlotacion;
    public $numHelices;

    public function __construct($matricula, $potencia, $velocidadMedia, $esloraTotal, $esloraFlotacion, $numHelices)
    {
        parent::__construct($matricula, $potencia, $velocidadMedia);
        $this->esloraTotal = $esloraTotal;
        $this->esloraFlotacion = $esloraFlotacion;
        $this->numHelices = $numHelices;
    }

    public function calcularPrecio($esloraTotal, $potencia)
    {
        $precio = (2500 * $esloraTotal) * $potencia;
        echo "Precio del Vehículo: {$precio}€" . "<br>";
    }

    function printNombre()
    {
        echo "Matrícula: {$this->matricula}" . " y " . "Num. Helices: {$this->numHelices}" . "<br>";
    }
}

$vehiculo1 = new Vehiculo('9090 HPG', 111, 60);
$maritimo1 = new Maritimo('3453 TTY', 121, 126, 88, 23, 10);

$vehiculo1->printNombre();
$vehiculo1->calcularTiempo(80, 200);
$maritimo1->printNombre();
$maritimo1->calcularPrecio(20, 10);
