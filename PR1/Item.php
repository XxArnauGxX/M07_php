<?php

require_once 'Naming.php';

abstract class Item implements Naming
{
    public string $name;
    public float $weight;
    public float $price;
    public bool $isNew;

    protected function __construct(string $name, float $weight, float $price, bool $isNew)
    {
        $this->name = $name;
        $this->weight = $weight;
        $this->price = $price;
        $this->isNew = $isNew;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function getWeight(): float
    {
        return $this->weight;
    }
    public function setWeight(float $weight): void
    {
        $this->weight = $weight;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
    public function getIsNew(): bool
    {
        return $this->isNew;
    }
    public function setIsNew(bool $isNew): void
    {
        $this->isNew = $isNew;
    }
    public function __toString(): string
    {
        return "Name: {$this->name}, Weight: {$this->weight}kg, Price: {$this->price}€, Is new: " . ($this->isNew ? 'true' : 'false');
    }

    abstract public function calcPriceWithTax(): float;
}
