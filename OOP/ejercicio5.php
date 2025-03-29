<?php

abstract class DosDimensiones
{
    protected float $width;
    protected float $height;
    protected string $name;

    public function __construct($width, $height, $name)
    {
        $this->width = $width;
        $this->height = $height;
        $this->name = $name;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function mostrarDimension(): string
    {
        return "La base y la altura son: {$this->width} y {$this->height}";
    }

    abstract public function calcArea();
}

class Triangulo extends DosDimensiones
{
    private string $estilo;

    public function __construct($width, $height, $name, $estilo)
    {
        parent::__construct($width, $height, $name);
        $this->estilo = $estilo;
    }

    public function getEstilo()
    {
        return $this->estilo;
    }

    public function setEstilo($estilo)
    {
        $this->estilo = $estilo;
    }

    public function mostrarEstilo(): string
    {
        return "El triangulo tiene: {$this->estilo}";
    }

    public function calcArea()
    {
        $area = ($this->width * $this->height) / 2;
        return $area;
    }
}

class Cuadrado extends DosDimensiones
{
    public function __construct($width, $height, $name)
    {
        parent::__construct($width, $height, $name);
    }

    public function calcArea()
    {
        $area = $this->width * $this->height;
        return $area;
    }

    public function esCuadrado()
    {
        if ($this->width === $this->height) {
            echo "Es un cuadrado";
            return true;
        } else {
            echo "No es un cuadrado";
            return false;
        }
    }
}

$triangulo = new Triangulo(20, 10, 'Triangulo', 'Azul');
echo $triangulo->getEstilo() . "<br>";
$triangulo->setEstilo('Rojo') . "<br>";
echo $triangulo->getEstilo() . "<br>";
echo $triangulo->mostrarEstilo() . "<br>";
echo $triangulo->calcArea() . "<br>";
$cuadrado = new Cuadrado(20, 20, 'Cuadrado');
