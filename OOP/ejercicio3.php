<?php

class Shape
{
    public string $color;
    public bool $filled;

    public function __construct($color, $filled)
    {
        $this->color = $color;
        $this->filled = $filled;
    }

    public function __toString(): string
    {
        return "Color: {$this->color}, Filled: {$this->filled}" . "<br>";
    }
}

class Circle extends Shape
{
    public float $radius;

    public function __construct($color, $filled, $radius)
    {
        parent::__construct($color, $filled);
        $this->radius = $radius;
    }

    public function __toString(): string
    {
        return "Color: {$this->color}, Filled: {$this->filled}, Radius: {$this->radius}" . "<br>";
    }

    public function getArea(): float
    {
        return M_PI * pow($this->radius, 2);
    }

    public function getPerimeter(): float
    {
        return 2 * M_PI * $this->radius;
    }
}

class Rectangle extends Shape
{
    public float $width;
    public float $height;

    function __construct($color, $filled, $width, $height)
    {
        parent::__construct($color, $filled);
        $this->width = $width;
        $this->height = $height;
    }

    public function __toString(): string
    {
        return "Color: {$this->color}, Filled: {$this->filled}, Width: {$this->width}, Height: {$this->height}" . "<br>";
    }

    function getArea(): float
    {
        $area = $this->width * $this->height;
        return $area;
    }

    function getPerimeter(): float
    {
        $perimetro = 2 * ($this->width + $this->height);
        return $perimetro;
    }

    function getDiagonal(): float
    {
        $diagonal = sqrt(pow($this->width, 2) + pow($this->height, 2));
        return $diagonal;
    }
}

class Square extends Rectangle
{
    public float $side;

    public function __construct($color, $filled, $width, $height, $side)
    {
        parent::__construct($color, $filled, $width, $height);
        $this->side = $side;
    }

    public function __toString(): string
    {
        return "Color: {$this->color}, Filled: {$this->filled}, Width: {$this->width}, Height: {$this->height}, Side: {$this->side}" . "<br>";
    }
}

$circle = new Circle('Red', true, 12);
echo $circle->__toString();
echo $circle->getArea() . "<br>";
echo $circle->getPerimeter() . "<br>";
$rectangle = new Rectangle('Blue', false, 12, 6);
echo $rectangle->__toString();
echo $rectangle->getArea() . "<br>";
echo $rectangle->getPerimeter() . "<br>";
echo $rectangle->getDiagonal() . "<br>";
$square = new Square('Yellow', true, 18, 18, 8);
echo $square->__toString();
