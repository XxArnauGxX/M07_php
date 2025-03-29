<?php

require_once 'Naming.php';

abstract class Item implements Naming
{
    public string $name;
    public float $weight;
    public float $price;
    public bool $isNew;

    protected function __construct($name, $weight, $price, $isNew)
    {
        $this->name = $name;
        $this->weight = $weight;
        $this->price = $price;
        $this->isNew = $isNew;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getWeight()
    {
        return $this->weight;
    }
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getIsNew()
    {
        return $this->isNew;
    }
    public function setIsNew($isNew)
    {
        $this->isNew = $isNew;
    }
    public function __toString()
    {
        return "Name: {$this->name}, Weight: {$this->weight}kg, Price: {$this->price}€, Is new: {$this->isNew}";
    }

    abstract public function calcPriceWithTax();
}
