<?php

class Drink extends Expendable implements Naming
{
    public bool $isAlcoholic;
    public float $volume;

    public function __construct(DateTime $expireDate, float $tax, string $name, float $weight, float $price, bool $isNew, bool $isAlcoholic, float $volume)
    {
        parent::__construct($expireDate, $tax, $name, $weight, $price, $isNew);
        $this->isAlcoholic = $isAlcoholic;

        if ($this->isAlcoholic === true) {
            $tax = 21;
        }

        $this->tax = $tax;
    }

    public function __toString(): string
    {
        return "Name: {$this->name}, Weight: {$this->weight}kg, Price: {$this->price}€, Is new: " . ($this->isNew ? 'true' : 'false') . ", Expire date: {$this->expireDate->format('Y-m-d')}, Tax: {$this->tax}, Alcoholic: " . ($this->isAlcoholic ? 'true' : 'false') . ", Volume: {$this->volume}";
    }
}
