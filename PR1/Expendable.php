<?php

require_once 'Item.php';
require_once 'Naming.php';

class Expendable extends Item implements Naming
{
    protected DateTime $expireDate;
    protected float $tax;

    protected function __construct(string $name, float $weight, float $price, bool $isNew, string $expireDate, float $tax = 10)
    {
        parent::__construct($name, $weight, $price, $isNew);
        $this->expireDate = new DateTime($expireDate);
        $this->tax = $tax;
    }

    public function __toString(): string
    {
        return "Name: {$this->name}, Weight: {$this->weight}kg, Price: {$this->price}€, Is new: " . ($this->isNew ? 'true' : 'false') . ", Expire date: {$this->expireDate->format('Y-m-d')}, Tax: {$this->tax}";
    }

    public function calcPriceWithTax(): float
    {
        return $this->price + ($this->price * ($this->tax / 100));
    }

    public function isExpired(): bool
    {
        $actualDate = new DateTime();
        return $this->expireDate < $actualDate;
    }
}
